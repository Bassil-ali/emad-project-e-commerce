<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\HomePageMainDataTable;
use Carbon\Carbon;
use App\Models\HomePage;

use App\Http\Controllers\Validations\HomePageMainRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class HomePageMain extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:homepagemain_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:homepagemain_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:homepagemain_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:homepagemain_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(HomePageMainDataTable $homepagemain)
            {
               return $homepagemain->render('admin.homepagemain.index',['title'=>trans('admin.homepagemain')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.homepagemain.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(HomePageMainRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                HomePage::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('homepagemain'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$homepagemain =  HomePage::find($id);
        		return is_null($homepagemain) || empty($homepagemain)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.homepagemain.show',[
				    'title'=>trans('admin.show'),
					'homepagemain'=>$homepagemain
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$homepagemain =  HomePage::find($id);
        		return is_null($homepagemain) || empty($homepagemain)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.homepagemain.edit',[
				  'title'=>trans('admin.edit'),
				  'homepagemain'=>$homepagemain
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
				foreach (array_keys((new HomePageMainRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(HomePageMainRequest $request,$id)
            {
              // Check Record Exists
              $homepagemain =  HomePage::find($id);
              if(is_null($homepagemain) || empty($homepagemain)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              HomePage::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('homepagemain'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $homepagemain = HomePage::find($id);
               if(is_null($homepagemain) || empty($homepagemain)){
                return backWithError(trans('admin.undefinedRecord'),"homepagemain");
               }
                              it()->delete('homepage',$id);


                $homepagemain->delete();
                return backWithSuccess(trans('admin.deleted'),"homepagemain");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$homepagemain = HomePage::find($id);
                    	if(is_null($homepagemain) || empty($homepagemain)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('homepage',$id);


		                $homepagemain->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"homepagemain");
                }else {
                    $homepagemain = HomePage::find($data);
                    if(is_null($homepagemain) || empty($homepagemain)){
	                 return backWithError(trans('admin.undefinedRecord'),"homepagemain");
	                }
                    
                    	it()->delete('homepage',$data);

	                $homepagemain->delete();
	                return backWithSuccess(trans('admin.deleted'),"homepagemain");
                }
            }
            
}