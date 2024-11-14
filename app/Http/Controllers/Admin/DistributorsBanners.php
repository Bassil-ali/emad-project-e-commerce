<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DistributorsBannersDataTable;
use Carbon\Carbon;
use App\Models\DistributorsBanner;

use App\Http\Controllers\Validations\DistributorsBannersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class DistributorsBanners extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:distributorsbanners_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:distributorsbanners_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:distributorsbanners_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:distributorsbanners_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DistributorsBannersDataTable $distributorsbanners)
            {
               return $distributorsbanners->render('admin.distributorsbanners.index',['title'=>trans('admin.distributorsbanners')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.distributorsbanners.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(DistributorsBannersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                DistributorsBanner::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('distributorsbanners'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$distributorsbanners =  DistributorsBanner::find($id);
        		return is_null($distributorsbanners) || empty($distributorsbanners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributorsbanners.show',[
				    'title'=>trans('admin.show'),
					'distributorsbanners'=>$distributorsbanners
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$distributorsbanners =  DistributorsBanner::find($id);
        		return is_null($distributorsbanners) || empty($distributorsbanners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributorsbanners.edit',[
				  'title'=>trans('admin.edit'),
				  'distributorsbanners'=>$distributorsbanners
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
				foreach (array_keys((new DistributorsBannersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(DistributorsBannersRequest $request,$id)
            {
              // Check Record Exists
              $distributorsbanners =  DistributorsBanner::find($id);
              if(is_null($distributorsbanners) || empty($distributorsbanners)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              DistributorsBanner::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('distributorsbanners'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $distributorsbanners = DistributorsBanner::find($id);
               if(is_null($distributorsbanners) || empty($distributorsbanners)){
                return backWithError(trans('admin.undefinedRecord'),"distributorsbanners");
               }
                              it()->delete('distributorsbanner',$id);


                $distributorsbanners->delete();
                return backWithSuccess(trans('admin.deleted'),"distributorsbanners");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$distributorsbanners = DistributorsBanner::find($id);
                    	if(is_null($distributorsbanners) || empty($distributorsbanners)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('distributorsbanner',$id);


		                $distributorsbanners->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"distributorsbanners");
                }else {
                    $distributorsbanners = DistributorsBanner::find($data);
                    if(is_null($distributorsbanners) || empty($distributorsbanners)){
	                 return backWithError(trans('admin.undefinedRecord'),"distributorsbanners");
	                }
                    
                    	it()->delete('distributorsbanner',$data);

	                $distributorsbanners->delete();
	                return backWithSuccess(trans('admin.deleted'),"distributorsbanners");
                }
            }
            
}