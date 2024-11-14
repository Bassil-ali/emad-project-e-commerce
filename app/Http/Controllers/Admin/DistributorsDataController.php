<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DistributorsDataDataTable;
use Carbon\Carbon;
use App\Models\DistributorsData;

use App\Http\Controllers\Validations\DistributorsDataControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class DistributorsDataController extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:distributorsdatacontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:distributorsdatacontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:distributorsdatacontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:distributorsdatacontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DistributorsDataDataTable $distributorsdata)
            {
               return $distributorsdata->render('admin.distributorsdata.index',['title'=>trans('admin.distributorsdata')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.distributorsdata.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(DistributorsDataControllerRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                DistributorsData::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('distributorsdata'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$distributorsdata =  DistributorsData::find($id);
        		return is_null($distributorsdata) || empty($distributorsdata)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributorsdata.show',[
				    'title'=>trans('admin.show'),
					'distributorsdata'=>$distributorsdata
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$distributorsdata =  DistributorsData::find($id);
        		return is_null($distributorsdata) || empty($distributorsdata)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.distributorsdata.edit',[
				  'title'=>trans('admin.edit'),
				  'distributorsdata'=>$distributorsdata
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
				foreach (array_keys((new DistributorsDataControllerRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(DistributorsDataControllerRequest $request,$id)
            {
              // Check Record Exists
              $distributorsdata =  DistributorsData::find($id);
              if(is_null($distributorsdata) || empty($distributorsdata)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              DistributorsData::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('distributorsdata'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $distributorsdata = DistributorsData::find($id);
               if(is_null($distributorsdata) || empty($distributorsdata)){
                return backWithError(trans('admin.undefinedRecord'),"distributorsdata");
               }
                              it()->delete('distributorsdata',$id);


                $distributorsdata->delete();
                return backWithSuccess(trans('admin.deleted'),"distributorsdata");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$distributorsdata = DistributorsData::find($id);
                    	if(is_null($distributorsdata) || empty($distributorsdata)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('distributorsdata',$id);


		                $distributorsdata->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"distributorsdata");
                }else {
                    $distributorsdata = DistributorsData::find($data);
                    if(is_null($distributorsdata) || empty($distributorsdata)){
	                 return backWithError(trans('admin.undefinedRecord'),"distributorsdata");
	                }
                    
                    	it()->delete('distributorsdata',$data);

	                $distributorsdata->delete();
	                return backWithSuccess(trans('admin.deleted'),"distributorsdata");
                }
            }
            
}