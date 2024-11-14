<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogDetailsController extends Controller
{
    public function show($id)
    {
        $blog = Blog::findOrFail($id); // Fetch blog by ID
        $blogs = Blog::inRandomOrder()->take(5)->get();
        return view('blog-details', compact('blog','blogs'));
    }
}