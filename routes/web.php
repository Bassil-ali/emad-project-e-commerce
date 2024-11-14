<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\SubscriptionController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('logout');
	});

    //home page routes
	Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');


Route::get('/', function () {
	return view('welcome');
});

Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


L::LangNonymous();

Route::group(['middleware'=>'Lang'],function(){
	// Index
Route::get('/', [IndexController::class, 'index'])->name('index');

// About Us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

// Products
Route::get('/products/{id}', [ProductsController::class, 'index'])->name('products');

// Product Details
Route::get('/product-details/{id}', [ProductDetailsController::class, 'show'])->name('product-details');
Route::get('/products/search/name/{category_id}', [ProductsController::class, 'searchbyname'])->name('products-search-byname');
Route::get('/products/search/category/{category_id}', [ProductsController::class, 'searchbycategory'])->name('products-search-bycategory');

// Blogs
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');

// Blog Details
Route::get('/blog-details/{id}', [BlogDetailsController::class, 'show'])->name('blog-details');

// Partners
Route::get('/be-partner', [PartnersController::class, 'bePartner'])->name('be-partner');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');
Route::post('/partner-save', [PartnersController::class, 'store'])->name('partner-save');


// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Branches
Route::get('/branches', [BranchesController::class, 'index'])->name('branches');

Route::get('lang/{lang}', [LangController::class, 'switchLanguage'])->name('lang.switch');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');

Route::post('/orders', [OrderController::class, 'store'])->name('orders');

	});


