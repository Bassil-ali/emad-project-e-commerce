<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription; // Ensure you import your model
use Illuminate\Support\Facades\Validator;


class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
    

        // Save the email to the database
        Subscription::create([
            'email' => $request->email,
        ]);

        // Return a success message
        return response()->json(['success' => true]);
    }
}
