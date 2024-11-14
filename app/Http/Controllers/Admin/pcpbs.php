<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\pcpbsDataTable;
use Carbon\Carbon;
use App\Models\pcpb;

use App\Http\Controllers\Validations\pcpbsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class pcpbs extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:pcpbs_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:pcpbs_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:pcpbs_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:pcpbs_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(pcpbsDataTable $pcpbs)
            {
               return $pcpbs->render('admin.pcpbs.index',['title'=>trans('admin.pcpbs')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.pcpbs.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(pcpbsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                pcpb::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('pcpbs'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$pcpbs =  pcpb::find($id);
        		return is_null($pcpbs) || empty($pcpbs)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.pcpbs.show',[
				    'title'=>trans('admin.show'),
					'pcpbs'=>$pcpbs
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$pcpbs =  pcpb::find($id);
        		return is_null($pcpbs) || empty($pcpbs)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.pcpbs.edit',[
				  'title'=>trans('admin.edit'),
				  'pcpbs'=>$pcpbs
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
				foreach (array_keys((new pcpbsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(pcpbsRequest $request,$id)
            {
              // Check Record Exists
              $pcpbs =  pcpb::find($id);
              if(is_null($pcpbs) || empty($pcpbs)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              pcpb::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('pcpbs'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $pcpbs = pcpb::find($id);
               if(is_null($pcpbs) || empty($pcpbs)){
                return backWithError(trans('admin.undefinedRecord'),"pcpbs");
               }
                              it()->delete('pcpb',$id);


                $pcpbs->delete();
                return backWithSuccess(trans('admin.deleted'),"pcpbs");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$pcpbs = pcpb::find($id);
                    	if(is_null($pcpbs) || empty($pcpbs)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('pcpb',$id);


		                $pcpbs->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"pcpbs");
                }else {
                    $pcpbs = pcpb::find($data);
                    if(is_null($pcpbs) || empty($pcpbs)){
	                 return backWithError(trans('admin.undefinedRecord'),"pcpbs");
	                }
                    
                    	it()->delete('pcpb',$data);

	                $pcpbs->delete();
	                return backWithSuccess(trans('admin.deleted'),"pcpbs");
                }
            }
            
}