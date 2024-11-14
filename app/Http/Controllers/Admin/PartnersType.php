<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PartnersTypeDataTable;
use Carbon\Carbon;
use App\Models\PartnerType;

use App\Http\Controllers\Validations\PartnersTypeRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class PartnersType extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:partnerstype_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:partnerstype_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:partnerstype_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:partnerstype_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PartnersTypeDataTable $partnerstype)
            {
               return $partnerstype->render('admin.partnerstype.index',['title'=>trans('admin.partnerstype')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.partnerstype.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(PartnersTypeRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                PartnerType::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('partnerstype'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$partnerstype =  PartnerType::find($id);
        		return is_null($partnerstype) || empty($partnerstype)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.partnerstype.show',[
				    'title'=>trans('admin.show'),
					'partnerstype'=>$partnerstype
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$partnerstype =  PartnerType::find($id);
        		return is_null($partnerstype) || empty($partnerstype)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.partnerstype.edit',[
				  'title'=>trans('admin.edit'),
				  'partnerstype'=>$partnerstype
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
				foreach (array_keys((new PartnersTypeRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(PartnersTypeRequest $request,$id)
            {
              // Check Record Exists
              $partnerstype =  PartnerType::find($id);
              if(is_null($partnerstype) || empty($partnerstype)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              PartnerType::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('partnerstype'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $partnerstype = PartnerType::find($id);
               if(is_null($partnerstype) || empty($partnerstype)){
                return backWithError(trans('admin.undefinedRecord'),"partnerstype");
               }
                              it()->delete('partnertype',$id);


                $partnerstype->delete();
                return backWithSuccess(trans('admin.deleted'),"partnerstype");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$partnerstype = PartnerType::find($id);
                    	if(is_null($partnerstype) || empty($partnerstype)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('partnertype',$id);


		                $partnerstype->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"partnerstype");
                }else {
                    $partnerstype = PartnerType::find($data);
                    if(is_null($partnerstype) || empty($partnerstype)){
	                 return backWithError(trans('admin.undefinedRecord'),"partnerstype");
	                }
                    
                    	it()->delete('partnertype',$data);

	                $partnerstype->delete();
	                return backWithSuccess(trans('admin.deleted'),"partnerstype");
                }
            }
            
}