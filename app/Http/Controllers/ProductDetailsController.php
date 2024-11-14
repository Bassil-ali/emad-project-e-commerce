<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailsController extends Controller
{
    public function show($id)
    {
         // Fetch the product along with its related category
    $product = Product::with('category','ingredients')->findOrFail($id);
    $randomProducts = Product::inRandomOrder()->take(15)->get();
    // Pass product (and its category) to the view
    return view('product-details', compact('product','randomProducts'));
    }
}
