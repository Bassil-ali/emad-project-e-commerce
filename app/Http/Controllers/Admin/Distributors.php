<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DistributorsDataTable;
use Carbon\Carbon;
use App\Models\Distributor;

use App\Http\Controllers\Validations\DistributorsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Distributors extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:distributors_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:distributors_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:distributors_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:distributors_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DistributorsDataTable $distributors)
            {
               return $distributors->render('admin.distributors.index',['title'=>trans('admin.distributors')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.distributors.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(DistributorsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','distributors');
              }else{
              $data['photo'] = "";
              }
                Distributor::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('distributors'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$distributors =  Distributor::find($id);
        		return is_null($distributors) || empty($distributors)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributors.show',[
				    'title'=>trans('admin.show'),
					'distributors'=>$distributors
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$distributors =  Distributor::find($id);
        		return is_null($distributors) || empty($distributors)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributors.edit',[
				  'title'=>trans('admin.edit'),
				  'distributors'=>$distributors
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
				foreach (array_keys((new DistributorsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(DistributorsRequest $request,$id)
            {
              // Check Record Exists
              $distributors =  Distributor::find($id);
              if(is_null($distributors) || empty($distributors)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($distributors->photo);
              $data['photo'] = it()->upload('photo','distributors');
               } 
              Distributor::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('distributors'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $distributors = Distributor::find($id);
               if(is_null($distributors) || empty($distributors)){
                return backWithError(trans('admin.undefinedRecord'),"distributors");
               }
                              if(!empty($distributors->photo)){
               it()->delete($distributors->photo);
               }
               it()->delete('distributor',$id);


                $distributors->delete();
                return backWithSuccess(trans('admin.deleted'),"distributors");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$distributors = Distributor::find($id);
                    	if(is_null($distributors) || empty($distributors)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($distributors->photo)){
                    	it()->delete($distributors->photo);
                    	}
                    	it()->delete('distributor',$id);


		                $distributors->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"distributors");
                }else {
                    $distributors = Distributor::find($data);
                    if(is_null($distributors) || empty($distributors)){
	                 return backWithError(trans('admin.undefinedRecord'),"distributors");
	                }
                    
                    	if(!empty($distributors->photo)){
                    	it()->delete($distributors->photo);
                    	}
                    	it()->delete('distributor',$data);

	                $distributors->delete();
	                return backWithSuccess(trans('admin.deleted'),"distributors");
                }
            }
            
}