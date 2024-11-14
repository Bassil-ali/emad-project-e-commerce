<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CareersDataTable;
use Carbon\Carbon;
use App\Models\Career;
use App\Mail\MailCareers;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Validations\CareersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Careers extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:careers_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:careers_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:careers_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:careers_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CareersDataTable $careers)
            {
               return $careers->render('admin.careers.index',['title'=>trans('admin.careers')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.careers.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(CareersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	               if(request()->hasFile('attach_cv')){
              $data['attach_cv'] = it()->upload('attach_cv','careers');
              }else{
              $data['attach_cv'] = "";
              }
              $details = Career::create($data); 

            

                 // Send the email using the Careers Mailable
                 Mail::to('admin@example.com')->send(new MailCareers($data));
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('careers'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$careers =  Career::find($id);
        		return is_null($careers) || empty($careers)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.careers.show',[
				    'title'=>trans('admin.show'),
					'careers'=>$careers
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$careers =  Career::find($id);
        		return is_null($careers) || empty($careers)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.careers.edit',[
				  'title'=>trans('admin.edit'),
				  'careers'=>$careers
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
				foreach (array_keys((new CareersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(CareersRequest $request,$id)
            {
              // Check Record Exists
              $careers =  Career::find($id);
              if(is_null($careers) || empty($careers)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('attach_cv')){
              it()->delete($careers->attach_cv);
              $data['attach_cv'] = it()->upload('attach_cv','careers');
               } 
              Career::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('careers'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $careers = Career::find($id);
               if(is_null($careers) || empty($careers)){
                return backWithError(trans('admin.undefinedRecord'),"careers");
               }
                              if(!empty($careers->attach_cv)){
               it()->delete($careers->attach_cv);
               }
               it()->delete('career',$id);


                $careers->delete();
                return backWithSuccess(trans('admin.deleted'),"careers");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$careers = Career::find($id);
                    	if(is_null($careers) || empty($careers)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($careers->attach_cv)){
                    	it()->delete($careers->attach_cv);
                    	}
                    	it()->delete('career',$id);


		                $careers->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"careers");
                }else {
                    $careers = Career::find($data);
                    if(is_null($careers) || empty($careers)){
	                 return backWithError(trans('admin.undefinedRecord'),"careers");
	                }
                    
                    	if(!empty($careers->attach_cv)){
                    	it()->delete($careers->attach_cv);
                    	}
                    	it()->delete('career',$data);

	                $careers->delete();
	                return backWithSuccess(trans('admin.deleted'),"careers");
                }
            }
            
}