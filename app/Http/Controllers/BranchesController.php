<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branche::all(); // Fetch all branches
        return view('branches', compact('branches'));
    }
}
