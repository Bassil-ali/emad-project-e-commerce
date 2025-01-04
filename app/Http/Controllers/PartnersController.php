<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerType;
use App\Models\BePartner;
use App\Models\partner;
use Illuminate\Support\Facades\Bus;
use App\Mail\PartnerAdded;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Validations\partnersRequest;
use Illuminate\Support\Facades\Validator;


class PartnersController extends Controller
{
    public function index()
    {
        $partner = BePartner::get();
        return view('partner',compact('partner'));
    }
    public function bePartner($type)
    {
        $PartnerTypes = PartnerType::all(); // Fetch all partners
        return view('be-partner', compact('PartnerTypes'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $data = $request;
        $validatedData = Validator::make($request->all(), [
            'partner_type' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required',
            'business_name' => 'nullable',
            'message' => 'required|string',
            'file' => ''
        ]);
        if ($validatedData->fails()) {
            // Return validation errors as JSON
            return response()->json(['errors' => $validatedData->errors()], 422);
        }
      if(request()->hasFile('file')){
      $data['file-e'] = it()->upload('file','partners');
      }else{
      $data['file-e'] = "";
      } 

     
     
      if ($request->partner_type === 'career') {
        // Send email to career-related recipients
        Mail::to(['hr@emadbakeries.com', 'info@emadbakeries.com'])->send(new PartnerAdded($data->toArray()));
    } elseif ($request->partner_type === 'partner') {
        // Send email to partner-related recipients
        Mail::to(['info@emadbakeries.com', 'media@emadbakeries.com', 'bilal.abozid@emadbakeries.com'])->send(new PartnerAdded($data->toArray()));
    }  
    
        Partner::create($request->toArray());
        
        return response()->json(['success' => 'Partner information saved successfully!'], 200);

    }
}