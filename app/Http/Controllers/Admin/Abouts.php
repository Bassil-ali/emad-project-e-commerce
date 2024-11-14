<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AboutsDataTable;
use Carbon\Carbon;
use App\Models\About;

use App\Http\Controllers\Validations\AboutsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Abouts extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:abouts_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:abouts_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:abouts_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:abouts_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AboutsDataTable $abouts)
            {
               return $abouts->render('admin.abouts.index',['title'=>trans('admin.abouts')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.abouts.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(AboutsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','abouts');
              }else{
              $data['photo'] = "";
              }
                About::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('abouts'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$abouts =  About::find($id);
        		return is_null($abouts) || empty($abouts)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.abouts.show',[
				    'title'=>trans('admin.show'),
					'abouts'=>$abouts
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$abouts =  About::find($id);
        		return is_null($abouts) || empty($abouts)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.abouts.edit',[
				  'title'=>trans('admin.edit'),
				  'abouts'=>$abouts
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
				foreach (array_keys((new AboutsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(AboutsRequest $request,$id)
            {
              // Check Record Exists
              $abouts =  About::find($id);
              if(is_null($abouts) || empty($abouts)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($abouts->photo);
              $data['photo'] = it()->upload('photo','abouts');
               } 
              About::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('abouts'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $abouts = About::find($id);
               if(is_null($abouts) || empty($abouts)){
                return backWithError(trans('admin.undefinedRecord'),"abouts");
               }
                              if(!empty($abouts->photo)){
               it()->delete($abouts->photo);
               }
               it()->delete('about',$id);


                $abouts->delete();
                return backWithSuccess(trans('admin.deleted'),"abouts");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$abouts = About::find($id);
                    	if(is_null($abouts) || empty($abouts)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete('about',$id);


		                $abouts->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"abouts");
                }else {
                    $abouts = About::find($data);
                    if(is_null($abouts) || empty($abouts)){
	                 return backWithError(trans('admin.undefinedRecord'),"abouts");
	                }
                    
                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete('about',$data);

	                $abouts->delete();
	                return backWithSuccess(trans('admin.deleted'),"abouts");
                }
            }
            
}