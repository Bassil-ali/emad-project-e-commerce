<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\HomePageDataTable;
use Carbon\Carbon;
use App\Models\HomePage;

use App\Http\Controllers\Validations\HomePageRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class HomePage extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:homepage_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:homepage_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:homepage_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:homepage_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(HomePageDataTable $homepage)
            {
               return $homepage->render('admin.homepage.index',['title'=>trans('admin.homepage')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.homepage.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(HomePageRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('client_photo')){
              $data['client_photo'] = it()->upload('client_photo','homepage');
              }else{
              $data['client_photo'] = "";
              }
               if(request()->hasFile('vedio')){
              $data['vedio'] = it()->upload('vedio','homepage');
              }else{
              $data['vedio'] = "";
              }
                HomePage::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('homepage'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$homepage =  HomePage::find($id);
        		return is_null($homepage) || empty($homepage)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.homepage.show',[
				    'title'=>trans('admin.show'),
					'homepage'=>$homepage
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$homepage =  HomePage::find($id);
        		return is_null($homepage) || empty($homepage)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.homepage.edit',[
				  'title'=>trans('admin.edit'),
				  'homepage'=>$homepage
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
				foreach (array_keys((new HomePageRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(HomePageRequest $request,$id)
            {
              // Check Record Exists
              $homepage =  HomePage::find($id);
              if(is_null($homepage) || empty($homepage)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('client_photo')){
              it()->delete($homepage->client_photo);
              $data['client_photo'] = it()->upload('client_photo','homepage');
               } 
               if(request()->hasFile('vedio')){
              it()->delete($homepage->vedio);
              $data['vedio'] = it()->upload('vedio','homepage');
               } 
              HomePage::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('homepage'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $homepage = HomePage::find($id);
               if(is_null($homepage) || empty($homepage)){
                return backWithError(trans('admin.undefinedRecord'),"homepage");
               }
                              if(!empty($homepage->client_photo)){
               it()->delete($homepage->client_photo);
               }
               if(!empty($homepage->vedio)){
               it()->delete($homepage->vedio);
               }
               it()->delete('homepage',$id);


                $homepage->delete();
                return backWithSuccess(trans('admin.deleted'),"homepage");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$homepage = HomePage::find($id);
                    	if(is_null($homepage) || empty($homepage)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($homepage->client_photo)){
                    	it()->delete($homepage->client_photo);
                    	}
                    	if(!empty($homepage->vedio)){
                    	it()->delete($homepage->vedio);
                    	}
                    	it()->delete('homepage',$id);


		                $homepage->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"homepage");
                }else {
                    $homepage = HomePage::find($data);
                    if(is_null($homepage) || empty($homepage)){
	                 return backWithError(trans('admin.undefinedRecord'),"homepage");
	                }
                    
                    	if(!empty($homepage->client_photo)){
                    	it()->delete($homepage->client_photo);
                    	}
                    	if(!empty($homepage->vedio)){
                    	it()->delete($homepage->vedio);
                    	}
                    	it()->delete('homepage',$data);

	                $homepage->delete();
	                return backWithSuccess(trans('admin.deleted'),"homepage");
                }
            }
            
}