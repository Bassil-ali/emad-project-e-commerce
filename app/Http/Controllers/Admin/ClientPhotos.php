<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ClientPhotosDataTable;
use Carbon\Carbon;
use App\Models\ClientPhoto;

use App\Http\Controllers\Validations\ClientPhotosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ClientPhotos extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:clientphotos_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:clientphotos_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:clientphotos_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:clientphotos_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ClientPhotosDataTable $clientphotos)
            {
               return $clientphotos->render('admin.clientphotos.index',['title'=>trans('admin.clientphotos')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.clientphotos.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ClientPhotosRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('client_photo')){
              $data['client_photo'] = it()->upload('client_photo','clientphotos');
              }else{
              $data['client_photo'] = "";
              }
                ClientPhoto::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('clientphotos'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$clientphotos =  ClientPhoto::find($id);
        		return is_null($clientphotos) || empty($clientphotos)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.clientphotos.show',[
				    'title'=>trans('admin.show'),
					'clientphotos'=>$clientphotos
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$clientphotos =  ClientPhoto::find($id);
        		return is_null($clientphotos) || empty($clientphotos)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.clientphotos.edit',[
				  'title'=>trans('admin.edit'),
				  'clientphotos'=>$clientphotos
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
				foreach (array_keys((new ClientPhotosRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ClientPhotosRequest $request,$id)
            {
              // Check Record Exists
              $clientphotos =  ClientPhoto::find($id);
              if(is_null($clientphotos) || empty($clientphotos)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('client_photo')){
              it()->delete($clientphotos->client_photo);
              $data['client_photo'] = it()->upload('client_photo','clientphotos');
               } 
              ClientPhoto::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('clientphotos'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $clientphotos = ClientPhoto::find($id);
               if(is_null($clientphotos) || empty($clientphotos)){
                return backWithError(trans('admin.undefinedRecord'),"clientphotos");
               }
                              if(!empty($clientphotos->client_photo)){
               it()->delete($clientphotos->client_photo);
               }
               it()->delete('clientphoto',$id);


                $clientphotos->delete();
                return backWithSuccess(trans('admin.deleted'),"clientphotos");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$clientphotos = ClientPhoto::find($id);
                    	if(is_null($clientphotos) || empty($clientphotos)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($clientphotos->client_photo)){
                    	it()->delete($clientphotos->client_photo);
                    	}
                    	it()->delete('clientphoto',$id);


		                $clientphotos->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"clientphotos");
                }else {
                    $clientphotos = ClientPhoto::find($data);
                    if(is_null($clientphotos) || empty($clientphotos)){
	                 return backWithError(trans('admin.undefinedRecord'),"clientphotos");
	                }
                    
                    	if(!empty($clientphotos->client_photo)){
                    	it()->delete($clientphotos->client_photo);
                    	}
                    	it()->delete('clientphoto',$data);

	                $clientphotos->delete();
	                return backWithSuccess(trans('admin.deleted'),"clientphotos");
                }
            }
            
}