<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\FootersocialsDataTable;
use Carbon\Carbon;
use App\Models\Footersocial;

use App\Http\Controllers\Validations\FootersocialsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Footersocials extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:footersocials_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:footersocials_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:footersocials_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:footersocials_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(FootersocialsDataTable $footersocials)
            {
               return $footersocials->render('admin.footersocials.index',['title'=>trans('admin.footersocials')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.footersocials.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(FootersocialsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','footersocials');
              }else{
              $data['photo'] = "";
              }
                Footersocial::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('footersocials'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$footersocials =  Footersocial::find($id);
        		return is_null($footersocials) || empty($footersocials)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.footersocials.show',[
				    'title'=>trans('admin.show'),
					'footersocials'=>$footersocials
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$footersocials =  Footersocial::find($id);
        		return is_null($footersocials) || empty($footersocials)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.footersocials.edit',[
				  'title'=>trans('admin.edit'),
				  'footersocials'=>$footersocials
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
				foreach (array_keys((new FootersocialsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(FootersocialsRequest $request,$id)
            {
              // Check Record Exists
              $footersocials =  Footersocial::find($id);
              if(is_null($footersocials) || empty($footersocials)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($footersocials->photo);
              $data['photo'] = it()->upload('photo','footersocials');
               } 
              Footersocial::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('footersocials'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
              
               $footersocials = Footersocial::find($id);
               if(is_null($footersocials) || empty($footersocials)){
                return backWithError(trans('admin.undefinedRecord'),"footersocials");
               }
                              if(!empty($footersocials->photo)){
               it()->delete($footersocials->photo);
               }
               it()->delete('footersocial',$id);


                $footersocials->delete();
                return backWithSuccess(trans('admin.deleted'),"footersocials");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$footersocials = Footersocial::find($id);
                    	if(is_null($footersocials) || empty($footersocials)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($footersocials->photo)){
                    	it()->delete($footersocials->photo);
                    	}
                    	it()->delete('footersocial',$id);


		                $footersocials->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"footersocials");
                }else {
                    $footersocials = Footersocial::find($data);
                    if(is_null($footersocials) || empty($footersocials)){
	                 return backWithError(trans('admin.undefinedRecord'),"footersocials");
	                }
                    
                    	if(!empty($footersocials->photo)){
                    	it()->delete($footersocials->photo);
                    	}
                    	it()->delete('footersocial',$data);

	                $footersocials->delete();
	                return backWithSuccess(trans('admin.deleted'),"footersocials");
                }
            }
            
}