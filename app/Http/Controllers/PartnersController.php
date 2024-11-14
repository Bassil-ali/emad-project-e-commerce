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
        $partner = BePartner::first();
        return view('partner',compact('partner'));
    }
    public function bePartner()
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email_address' => 'required|email|max:255',
            'business_name' => 'nullable|string|max:255',
            'message' => 'required|string',
            'file' => 'required'
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

     
     
        // Send email to the manager
        Mail::to('hr@emadbakeries.com')->send(new PartnerAdded($data->toArray()));
        Partner::create($request->toArray());
        
        return response()->json(['success' => 'Partner information saved successfully!'], 200);

    }
}