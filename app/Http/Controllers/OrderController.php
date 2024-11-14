<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
       
        
       

        
        // Save order logic (e.g., create an Order model)
        $order = Order::create($request->all());

       

        Mail::to(['info@emadbakeries.com', 'media@emadbakeries.com', 'bilal.abozid@emadbakeries.com'])
        ->send(new OrderNotification($order));

    
        return redirect()->back()->with('success', 'Order has been sent successfully!');
    }
}
