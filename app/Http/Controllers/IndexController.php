<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footersocial;
use App\Models\Banner;
use App\Models\Distributor;
use App\Models\ServedIndustrie;
use App\Models\Product;
use App\Models\Blog;
use App\Models\pcpb; 
use App\Models\ClientSay;



class IndexController extends Controller
{
    public function index()
    {
        $footerSocials = Footersocial::get();
         // Retrieve banners from the database
         $banners = Banner::all(); // Adjust this as necessary for your needs
         $distributors = Distributor::get();

         $servedIndustries = ServedIndustrie::all(); // Fetch all served industries

         $latestProducts = Product::orderBy('created_at', 'desc')->take(4)->get();

         $posts = Blog::latest()->take(3)->get();

         $pcpb = pcpb::first();

         $clientSays = ClientSay::all();

        // Fetch any data needed for the home page
        return view('main', compact('footerSocials','banners','distributors',
        'servedIndustries','latestProducts','posts','pcpb','clientSays'));
    }
}
