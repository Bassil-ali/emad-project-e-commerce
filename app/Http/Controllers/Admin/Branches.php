<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BranchesDataTable;
use Carbon\Carbon;
use App\Models\Branche;

use App\Http\Controllers\Validations\BranchesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Branches extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:branches_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:branches_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:branches_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:branches_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BranchesDataTable $branches)
            {
               return $branches->render('admin.branches.index',['title'=>trans('admin.branches')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.branches.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BranchesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	  Branche::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('branches'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$branches =  Branche::find($id);
        		return is_null($branches) || empty($branches)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.branches.show',[
				    'title'=>trans('admin.show'),
					'branches'=>$branches
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$branches =  Branche::find($id);
        		return is_null($branches) || empty($branches)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.branches.edit',[
				  'title'=>trans('admin.edit'),
				  'branches'=>$branches
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
				foreach (array_keys((new BranchesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BranchesRequest $request,$id)
            {
              //dd( $request);
              // Check Record Exists
              $branches =  Branche::find($id);
              
              if(is_null($branches) || empty($branches)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
             
              Branche::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('branches'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $branches = Branche::find($id);
               if(is_null($branches) || empty($branches)){
                return backWithError(trans('admin.undefinedRecord'),"branches");
               }
                              it()->delete('branche',$id);


                $branches->delete();
                return backWithSuccess(trans('admin.deleted'),"branches");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$branches = Branche::find($id);
                    	if(is_null($branches) || empty($branches)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('branche',$id);


		                $branches->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"branches");
                }else {
                    $branches = Branche::find($data);
                    if(is_null($branches) || empty($branches)){
	                 return backWithError(trans('admin.undefinedRecord'),"branches");
	                }
                    
                    	it()->delete('branche',$data);

	                $branches->delete();
	                return backWithSuccess(trans('admin.deleted'),"branches");
                }
            }
            
}