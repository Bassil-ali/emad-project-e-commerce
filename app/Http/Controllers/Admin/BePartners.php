<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BePartnersDataTable;
use Carbon\Carbon;
use App\Models\BePartner;

use App\Http\Controllers\Validations\BePartnersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class BePartners extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:bepartners_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:bepartners_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:bepartners_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:bepartners_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BePartnersDataTable $bepartners)
            {
               return $bepartners->render('admin.bepartners.index',['title'=>trans('admin.bepartners')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.bepartners.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BePartnersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','bepartners');
              }else{
              $data['photo'] = "";
              }
                BePartner::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('bepartners'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$bepartners =  BePartner::find($id);
        		return is_null($bepartners) || empty($bepartners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.bepartners.show',[
				    'title'=>trans('admin.show'),
					'bepartners'=>$bepartners
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$bepartners =  BePartner::find($id);
        		return is_null($bepartners) || empty($bepartners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.bepartners.edit',[
				  'title'=>trans('admin.edit'),
				  'bepartners'=>$bepartners
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
				foreach (array_keys((new BePartnersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BePartnersRequest $request,$id)
            {
              // Check Record Exists
              $bepartners =  BePartner::find($id);
              if(is_null($bepartners) || empty($bepartners)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($bepartners->photo);
              $data['photo'] = it()->upload('photo','bepartners');
               } 
              BePartner::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('bepartners'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $bepartners = BePartner::find($id);
               if(is_null($bepartners) || empty($bepartners)){
                return backWithError(trans('admin.undefinedRecord'),"bepartners");
               }
                              if(!empty($bepartners->photo)){
               it()->delete($bepartners->photo);
               }
               it()->delete('bepartner',$id);


                $bepartners->delete();
                return backWithSuccess(trans('admin.deleted'),"bepartners");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$bepartners = BePartner::find($id);
                    	if(is_null($bepartners) || empty($bepartners)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($bepartners->photo)){
                    	it()->delete($bepartners->photo);
                    	}
                    	it()->delete('bepartner',$id);


		                $bepartners->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"bepartners");
                }else {
                    $bepartners = BePartner::find($data);
                    if(is_null($bepartners) || empty($bepartners)){
	                 return backWithError(trans('admin.undefinedRecord'),"bepartners");
	                }
                    
                    	if(!empty($bepartners->photo)){
                    	it()->delete($bepartners->photo);
                    	}
                    	it()->delete('bepartner',$data);

	                $bepartners->delete();
	                return backWithSuccess(trans('admin.deleted'),"bepartners");
                }
            }
            
}