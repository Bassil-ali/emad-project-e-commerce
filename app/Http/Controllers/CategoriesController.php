<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();

        // Return view with categories data
        return view('categories', compact('categories'));
    }
}
