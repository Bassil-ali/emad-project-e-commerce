<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\clientSaysDataTable;
use Carbon\Carbon;
use App\Models\clientSay;

use App\Http\Controllers\Validations\clientSaysRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class clientSays extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:clientsays_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:clientsays_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:clientsays_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:clientsays_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(clientSaysDataTable $clientsays)
            {
               return $clientsays->render('admin.clientsays.index',['title'=>trans('admin.clientsays')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.clientsays.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(clientSaysRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','clientsays');
              }else{
              $data['photo'] = "";
              }
                clientSay::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('clientsays'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$clientsays =  clientSay::find($id);
        		return is_null($clientsays) || empty($clientsays)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.clientsays.show',[
				    'title'=>trans('admin.show'),
					'clientsays'=>$clientsays
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$clientsays =  clientSay::find($id);
        		return is_null($clientsays) || empty($clientsays)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.clientsays.edit',[
				  'title'=>trans('admin.edit'),
				  'clientsays'=>$clientsays
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
				foreach (array_keys((new clientSaysRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(clientSaysRequest $request,$id)
            {
              // Check Record Exists
              $clientsays =  clientSay::find($id);
              if(is_null($clientsays) || empty($clientsays)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($clientsays->photo);
              $data['photo'] = it()->upload('photo','clientsays');
               } 
              clientSay::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('clientsays'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $clientsays = clientSay::find($id);
               if(is_null($clientsays) || empty($clientsays)){
                return backWithError(trans('admin.undefinedRecord'),"clientsays");
               }
                              if(!empty($clientsays->photo)){
               it()->delete($clientsays->photo);
               }
               it()->delete('clientsay',$id);


                $clientsays->delete();
                return backWithSuccess(trans('admin.deleted'),"clientsays");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$clientsays = clientSay::find($id);
                    	if(is_null($clientsays) || empty($clientsays)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($clientsays->photo)){
                    	it()->delete($clientsays->photo);
                    	}
                    	it()->delete('clientsay',$id);


		                $clientsays->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"clientsays");
                }else {
                    $clientsays = clientSay::find($data);
                    if(is_null($clientsays) || empty($clientsays)){
	                 return backWithError(trans('admin.undefinedRecord'),"clientsays");
	                }
                    
                    	if(!empty($clientsays->photo)){
                    	it()->delete($clientsays->photo);
                    	}
                    	it()->delete('clientsay',$data);

	                $clientsays->delete();
	                return backWithSuccess(trans('admin.deleted'),"clientsays");
                }
            }
            
}