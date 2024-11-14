<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BannersDataTable;
use Carbon\Carbon;
use App\Models\Banner;

use App\Http\Controllers\Validations\BannersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Banners extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:banners_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:banners_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:banners_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:banners_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BannersDataTable $banners)
            {
               return $banners->render('admin.banners.index',['title'=>trans('admin.banners')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.banners.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BannersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','banners');
              }else{
              $data['photo'] = "";
              }
                Banner::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('banners'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$banners =  Banner::find($id);
        		return is_null($banners) || empty($banners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.banners.show',[
				    'title'=>trans('admin.show'),
					'banners'=>$banners
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$banners =  Banner::find($id);
        		return is_null($banners) || empty($banners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.banners.edit',[
				  'title'=>trans('admin.edit'),
				  'banners'=>$banners
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new BannersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BannersRequest $request,$id)
            {
              // Check Record Exists
              $banners =  Banner::find($id);
              if(is_null($banners) || empty($banners)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($banners->photo);
              $data['photo'] = it()->upload('photo','banners');
               } 
              Banner::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('banners'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $banners = Banner::find($id);
               if(is_null($banners) || empty($banners)){
                return backWithError(trans('admin.undefinedRecord'),"banners");
               }
                              if(!empty($banners->photo)){
               it()->delete($banners->photo);
               }
               it()->delete('banner',$id);


                $banners->delete();
                return backWithSuccess(trans('admin.deleted'),"banners");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$banners = Banner::find($id);
                    	if(is_null($banners) || empty($banners)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($banners->photo)){
                    	it()->delete($banners->photo);
                    	}
                    	it()->delete('banner',$id);


		                $banners->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"banners");
                }else {
                    $banners = Banner::find($data);
                    if(is_null($banners) || empty($banners)){
	                 return backWithError(trans('admin.undefinedRecord'),"banners");
	                }
                    
                    	if(!empty($banners->photo)){
                    	it()->delete($banners->photo);
                    	}
                    	it()->delete('banner',$data);

	                $banners->delete();
	                return backWithSuccess(trans('admin.deleted'),"banners");
                }
            }
            
}