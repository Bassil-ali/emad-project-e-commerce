 <?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
	return 'admin';
});

\L::Panel(app('admin')); /// Set Lang redirect to admin
\L::LangNonymous(); // Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
	Route::get('lock/screen', 'Admin\AdminAuthenticated@lock_screen');
	Route::get('theme/{id}', 'Admin\Dashboard@theme');
	Route::group(['middleware' => 'admin_guest'], function () {

		Route::get('login', 'Admin\AdminAuthenticated@login_page');
		Route::post('login', 'Admin\AdminAuthenticated@login_post');
		Route::view('forgot/password', 'admin.forgot_password');

		Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
		Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
		Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
	});
	/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */
	Route::view('need/permission', 'admin.no_permission');

	Route::group(['middleware' => 'admin:admin'], function () {
		if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
			Route::group(['prefix' => 'filemanager'], function () {
				\UniSharp\LaravelFilemanager\Lfm::routes();
			});
		}

		//////// Admin Routes /* Start */ //////////////
		Route::get('/', 'Admin\Dashboard@home');
		Route::any('logout', 'Admin\AdminAuthenticated@logout');

		Route::get('account', 'Admin\AdminAuthenticated@account');
		Route::post('account', 'Admin\AdminAuthenticated@account_post');
		Route::resource('settings', 'Admin\Settings');

		Route::resource('admingroups', 'Admin\AdminGroups');
		Route::post('admingroups/multi_delete', 'Admin\AdminGroups@multi_delete');
		Route::resource('admins', 'Admin\Admins');
		Route::post('admins/multi_delete', 'Admin\Admins@multi_delete');
		Route::resource('tests', 'Admin\Tests');
		Route::post('tests/multi_delete', 'Admin\Tests@multi_delete');
		Route::resource('sendemails','Admin\SendEmails'); 
				
				Route::resource('homepagemain','Admin\HomePageMain'); 
				Route::post('homepagemain/multi_delete','Admin\HomePageMain@multi_delete'); 
				Route::resource('clientphoto','Admin\ClientPhoto'); 
				Route::post('clientphoto/multi_delete','Admin\ClientPhoto@multi_delete'); 
				Route::resource('servedindustries','Admin\ServedIndustries'); 
				Route::post('servedindustries/multi_delete','Admin\ServedIndustries@multi_delete'); 
				Route::resource('clientsays','Admin\clientSays'); 
				Route::post('clientsays/multi_delete','Admin\clientSays@multi_delete'); 
				Route::resource('clientphotos','Admin\ClientPhotos'); 
				Route::post('clientphotos/multi_delete','Admin\ClientPhotos@multi_delete'); 
				Route::resource('ingredients','Admin\ingredients'); 
				Route::post('ingredients/multi_delete','Admin\ingredients@multi_delete'); 
				Route::resource('products','Admin\Products'); 
				Route::post('products/multi_delete','Admin\Products@multi_delete'); 
				Route::resource('categories','Admin\Categories'); 
				Route::post('categories/multi_delete','Admin\Categories@multi_delete'); 
				Route::resource('orders','Admin\orders'); 
				Route::post('orders/multi_delete','Admin\orders@multi_delete'); 
				Route::resource('blogs','Admin\Blogs'); 
				Route::post('blogs/multi_delete','Admin\Blogs@multi_delete'); 
				Route::resource('galleries','Admin\Galleries'); 
				Route::post('galleries/multi_delete','Admin\Galleries@multi_delete'); 
				Route::resource('abouts','Admin\Abouts'); 
				Route::post('abouts/multi_delete','Admin\Abouts@multi_delete'); 
				Route::resource('branches','Admin\Branches'); 
				Route::post('branches/multi_delete','Admin\Branches@multi_delete'); 
				Route::resource('careers','Admin\Careers'); 
				Route::post('careers/multi_delete','Admin\Careers@multi_delete'); 
				Route::resource('partnerstype','Admin\PartnersType'); 
				Route::post('partnerstype/multi_delete','Admin\PartnersType@multi_delete'); 
				Route::resource('distributors','Admin\Distributors'); 
				Route::post('distributors/multi_delete','Admin\Distributors@multi_delete'); 
				Route::resource('partners','Admin\partners'); 
				Route::post('partners/multi_delete','Admin\partners@multi_delete'); 
				Route::resource('banners','Admin\Banners'); 
				Route::post('banners/multi_delete','Admin\Banners@multi_delete'); 
				Route::resource('distributorsbanners','Admin\DistributorsBanners'); 
				Route::post('distributorsbanners/multi_delete','Admin\DistributorsBanners@multi_delete'); 
				Route::resource('distributorsdata','Admin\DistributorsDataController'); 
				Route::post('distributorsdata/multi_delete','Admin\DistributorsDataController@multi_delete'); 
				Route::resource('footersocials','Admin\Footersocials'); 
				Route::post('footersocials/multi_delete','Admin\Footersocials@multi_delete'); 
				Route::resource('bepartners','Admin\BePartners'); 
				Route::post('bepartners/multi_delete','Admin\BePartners@multi_delete'); 
				Route::resource('pcpbs','Admin\pcpbs'); 
				Route::post('pcpbs/multi_delete','Admin\pcpbs@multi_delete'); 
				//////// Admin Routes /* End */ //////////////
	});

});
