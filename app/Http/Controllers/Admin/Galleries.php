<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\GalleriesDataTable;
use Carbon\Carbon;
use App\Models\Gallery;

use App\Http\Controllers\Validations\GalleriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Galleries extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:galleries_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:galleries_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:galleries_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:galleries_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(GalleriesDataTable $galleries)
            {
               return $galleries->render('admin.galleries.index',['title'=>trans('admin.galleries')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.galleries.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(GalleriesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','galleries');
              }else{
              $data['photo'] = "";
              }
                Gallery::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('galleries'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$galleries =  Gallery::find($id);
        		return is_null($galleries) || empty($galleries)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.galleries.show',[
				    'title'=>trans('admin.show'),
					'galleries'=>$galleries
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$galleries =  Gallery::find($id);
        		return is_null($galleries) || empty($galleries)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.galleries.edit',[
				  'title'=>trans('admin.edit'),
				  'galleries'=>$galleries
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
				foreach (array_keys((new GalleriesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(GalleriesRequest $request,$id)
            {
              // Check Record Exists
              $galleries =  Gallery::find($id);
              if(is_null($galleries) || empty($galleries)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($galleries->photo);
              $data['photo'] = it()->upload('photo','galleries');
               } 
              Gallery::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('galleries'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $galleries = Gallery::find($id);
               if(is_null($galleries) || empty($galleries)){
                return backWithError(trans('admin.undefinedRecord'),"galleries");
               }
                              if(!empty($galleries->photo)){
               it()->delete($galleries->photo);
               }
               it()->delete('gallery',$id);


                $galleries->delete();
                return backWithSuccess(trans('admin.deleted'),"galleries");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$galleries = Gallery::find($id);
                    	if(is_null($galleries) || empty($galleries)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($galleries->photo)){
                    	it()->delete($galleries->photo);
                    	}
                    	it()->delete('gallery',$id);


		                $galleries->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"galleries");
                }else {
                    $galleries = Gallery::find($data);
                    if(is_null($galleries) || empty($galleries)){
	                 return backWithError(trans('admin.undefinedRecord'),"galleries");
	                }
                    
                    	if(!empty($galleries->photo)){
                    	it()->delete($galleries->photo);
                    	}
                    	it()->delete('gallery',$data);

	                $galleries->delete();
	                return backWithSuccess(trans('admin.deleted'),"galleries");
                }
            }
            
}