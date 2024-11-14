<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query'); // Get the search query
    
        if ($query) {
            // If there is a search query, filter the blogs
            $blogs = Blog::where('name_ar', 'like', '%' . $query . '%')
                ->orWhere('name_en', 'like', '%' . $query . '%')
                ->get();
        } else {
            // If no search query, show all blogs
            $blogs = Blog::all();
        }
    
        return view('blogs', compact('blogs'));
    }
    
   

}