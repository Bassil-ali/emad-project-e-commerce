<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ServedIndustriesDataTable;
use Carbon\Carbon;
use App\Models\ServedIndustrie;

use App\Http\Controllers\Validations\ServedIndustriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ServedIndustries extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:servedindustries_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:servedindustries_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:servedindustries_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:servedindustries_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ServedIndustriesDataTable $servedindustries)
            {
               return $servedindustries->render('admin.servedindustries.index',['title'=>trans('admin.servedindustries')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.servedindustries.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ServedIndustriesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','servedindustries');
              }else{
              $data['photo'] = "";
              }
                ServedIndustrie::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('servedindustries'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$servedindustries =  ServedIndustrie::find($id);
        		return is_null($servedindustries) || empty($servedindustries)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.servedindustries.show',[
				    'title'=>trans('admin.show'),
					'servedindustries'=>$servedindustries
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$servedindustries =  ServedIndustrie::find($id);
        		return is_null($servedindustries) || empty($servedindustries)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.servedindustries.edit',[
				  'title'=>trans('admin.edit'),
				  'servedindustries'=>$servedindustries
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
				foreach (array_keys((new ServedIndustriesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ServedIndustriesRequest $request,$id)
            {
              // Check Record Exists
              $servedindustries =  ServedIndustrie::find($id);
              if(is_null($servedindustries) || empty($servedindustries)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($servedindustries->photo);
              $data['photo'] = it()->upload('photo','servedindustries');
               } 
              ServedIndustrie::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('servedindustries'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $servedindustries = ServedIndustrie::find($id);
               if(is_null($servedindustries) || empty($servedindustries)){
                return backWithError(trans('admin.undefinedRecord'),"servedindustries");
               }
                              if(!empty($servedindustries->photo)){
               it()->delete($servedindustries->photo);
               }
               it()->delete('servedindustrie',$id);


                $servedindustries->delete();
                return backWithSuccess(trans('admin.deleted'),"servedindustries");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$servedindustries = ServedIndustrie::find($id);
                    	if(is_null($servedindustries) || empty($servedindustries)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($servedindustries->photo)){
                    	it()->delete($servedindustries->photo);
                    	}
                    	it()->delete('servedindustrie',$id);


		                $servedindustries->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"servedindustries");
                }else {
                    $servedindustries = ServedIndustrie::find($data);
                    if(is_null($servedindustries) || empty($servedindustries)){
	                 return backWithError(trans('admin.undefinedRecord'),"servedindustries");
	                }
                    
                    	if(!empty($servedindustries->photo)){
                    	it()->delete($servedindustries->photo);
                    	}
                    	it()->delete('servedindustrie',$data);

	                $servedindustries->delete();
	                return backWithSuccess(trans('admin.deleted'),"servedindustries");
                }
            }
            
}