<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\vediosDataTable;
use Carbon\Carbon;
use App\Models\vedio;

use App\Http\Controllers\Validations\vediosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class vedios extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:vedios_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:vedios_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:vedios_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:vedios_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(vediosDataTable $vedios)
            {
               return $vedios->render('admin.vedios.index',['title'=>trans('admin.vedios')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.vedios.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(vediosRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('vedio')){
              $data['vedio'] = it()->upload('vedio','vedios');
              }else{
              $data['vedio'] = "";
              }
                vedio::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('vedios'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$vedios =  vedio::find($id);
        		return is_null($vedios) || empty($vedios)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.vedios.show',[
				    'title'=>trans('admin.show'),
					'vedios'=>$vedios
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$vedios =  vedio::find($id);
        		return is_null($vedios) || empty($vedios)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.vedios.edit',[
				  'title'=>trans('admin.edit'),
				  'vedios'=>$vedios
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
				foreach (array_keys((new vediosRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(vediosRequest $request,$id)
            {
              // Check Record Exists
              $vedios =  vedio::find($id);
              if(is_null($vedios) || empty($vedios)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('vedio')){
              it()->delete($vedios->vedio);
              $data['vedio'] = it()->upload('vedio','vedios');
               } 
              vedio::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('vedios'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $vedios = vedio::find($id);
               if(is_null($vedios) || empty($vedios)){
                return backWithError(trans('admin.undefinedRecord'),"vedios");
               }
                              if(!empty($vedios->vedio)){
               it()->delete($vedios->vedio);
               }
               it()->delete('vedio',$id);


                $vedios->delete();
                return backWithSuccess(trans('admin.deleted'),"vedios");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$vedios = vedio::find($id);
                    	if(is_null($vedios) || empty($vedios)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($vedios->vedio)){
                    	it()->delete($vedios->vedio);
                    	}
                    	it()->delete('vedio',$id);


		                $vedios->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"vedios");
                }else {
                    $vedios = vedio::find($data);
                    if(is_null($vedios) || empty($vedios)){
	                 return backWithError(trans('admin.undefinedRecord'),"vedios");
	                }
                    
                    	if(!empty($vedios->vedio)){
                    	it()->delete($vedios->vedio);
                    	}
                    	it()->delete('vedio',$data);

	                $vedios->delete();
	                return backWithSuccess(trans('admin.deleted'),"vedios");
                }
            }
            
}