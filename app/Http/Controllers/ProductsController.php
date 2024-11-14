<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index($category_id)
    {
        // Fetch all products where the category_id matches the one in the route
        $products = Product::where('category_id', $category_id)->get();
        
        // Find the category for display
        $category = Category::findOrFail($category_id);
    
        // Fetch all categories for the dropdown
        $categories = Category::all();
    
        // Return to the 'products' view with the filtered products data
        return view('products', compact('products', 'category', 'categories'));
    }
    
    public function searchbyname(Request $request, $category_id)
    {
        $query = $request->input('query');
    
        // Get products based on the search query and category ID
        $products = Product::where('category_id', $category_id) // Ensure we filter by category
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name_ar', 'like', '%' . $query . '%')
                             ->orWhere('name_en', 'like', '%' . $query . '%');
            })
            ->get();
    
        // Fetch the category for display purposes
        $category = Category::find($category_id);
        $categories = Category::all(); // Fetch all categories for the dropdown
    
        return view('products', compact('products', 'category', 'categories'));
    }
    
    public function searchbycategory(Request $request, $category_id)
    {
        $query = $request->input('category_id');
    
        // Get products based on the selected category
        $products = Product::where('category_id', $query)->get();
    
        // Fetch the selected category for display purposes
        $category = Category::find($query);
        $categories = Category::all(); // Fetch all categories for the dropdown
    
        return view('products', compact('products', 'category', 'categories'));
    }
    
    
}
