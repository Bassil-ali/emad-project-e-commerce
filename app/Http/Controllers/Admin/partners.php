<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\partnersDataTable;
use Carbon\Carbon;
use App\Models\partner;
use Illuminate\Support\Facades\Bus;
use App\Mail\PartnerAdded;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Validations\partnersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class partners extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:partners_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:partners_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:partners_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:partners_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(partnersDataTable $partners)
            {
               return $partners->render('admin.partners.index',['title'=>trans('admin.partners')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.partners.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(partnersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('file')){
              $data['file'] = it()->upload('file','partners');
              }else{
              $data['file'] = "";
              } 
              
                // Send email to the manager
                Mail::to('hr@emadbakeries.com')->send(new PartnerAdded($data));
                partner::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('partners'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$partners =  partner::find($id);
        		return is_null($partners) || empty($partners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.partners.show',[
				    'title'=>trans('admin.show'),
					'partners'=>$partners
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$partners =  partner::find($id);
        		return is_null($partners) || empty($partners)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.partners.edit',[
				  'title'=>trans('admin.edit'),
				  'partners'=>$partners
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
				foreach (array_keys((new partnersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(partnersRequest $request,$id)
            {
              // Check Record Exists
              $partners =  partner::find($id);
              if(is_null($partners) || empty($partners)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('file')){
              it()->delete($partners->file);
              $data['file'] = it()->upload('file','partners');
               } 
              partner::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('partners'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $partners = partner::find($id);
               if(is_null($partners) || empty($partners)){
                return backWithError(trans('admin.undefinedRecord'),"partners");
               }
                              if(!empty($partners->file)){
               it()->delete($partners->file);
               }
               it()->delete('partner',$id);


                $partners->delete();
                return backWithSuccess(trans('admin.deleted'),"partners");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$partners = partner::find($id);
                    	if(is_null($partners) || empty($partners)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($partners->file)){
                    	it()->delete($partners->file);
                    	}
                    	it()->delete('partner',$id);


		                $partners->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"partners");
                }else {
                    $partners = partner::find($data);
                    if(is_null($partners) || empty($partners)){
	                 return backWithError(trans('admin.undefinedRecord'),"partners");
	                }
                    
                    	if(!empty($partners->file)){
                    	it()->delete($partners->file);
                    	}
                    	it()->delete('partner',$data);

	                $partners->delete();
	                return backWithSuccess(trans('admin.deleted'),"partners");
                }
            }
            
}