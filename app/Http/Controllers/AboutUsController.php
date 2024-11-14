<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        // Fetch data for the About Us page
        return view('about-us', compact('abouts'));
    }
}
