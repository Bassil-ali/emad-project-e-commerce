<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all(); // Fetch all gallery items
        return view('gallery', compact('gallery'));
    }
}
