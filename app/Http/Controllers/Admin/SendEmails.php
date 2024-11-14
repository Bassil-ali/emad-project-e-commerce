<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SendEmailsDataTable;
use App\Jobs\SendNewsletterJob;
use Illuminate\Support\Facades\Bus;

use Carbon\Carbon;
use App\SendEmail;

use App\Http\Controllers\Validations\SendEmailsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class SendEmails extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:sendemails_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:sendemails_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:sendemails_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:sendemails_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SendEmailsDataTable $sendemails)
            {
               return $sendemails->render('admin.sendemails.index',['title'=>trans('admin.sendemails')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.sendemails.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SendEmailsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
                SendEmail::create($data); 
                // Dispatch the job to send emails in the background
                Bus::dispatch(new SendNewsletterJob($request->message));
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('sendemails'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$sendemails =  SendEmail::find($id);
        		return is_null($sendemails) || empty($sendemails)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.sendemails.show',[
				    'title'=>trans('admin.show'),
					'sendemails'=>$sendemails
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$sendemails =  SendEmail::find($id);
        		return is_null($sendemails) || empty($sendemails)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.sendemails.edit',[
				  'title'=>trans('admin.edit'),
				  'sendemails'=>$sendemails
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
				foreach (array_keys((new SendEmailsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SendEmailsRequest $request,$id)
            {
              // Check Record Exists
              $sendemails =  SendEmail::find($id);
              if(is_null($sendemails) || empty($sendemails)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              SendEmail::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('sendemails'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $sendemails = SendEmail::find($id);
               if(is_null($sendemails) || empty($sendemails)){
                return backWithError(trans('admin.undefinedRecord'),"sendemails");
               }
                              it()->delete('sendemail',$id);


                $sendemails->delete();
                return backWithSuccess(trans('admin.deleted'),"sendemails");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$sendemails = SendEmail::find($id);
                    	if(is_null($sendemails) || empty($sendemails)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('sendemail',$id);


		                $sendemails->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"sendemails");
                }else {
                    $sendemails = SendEmail::find($data);
                    if(is_null($sendemails) || empty($sendemails)){
	                 return backWithError(trans('admin.undefinedRecord'),"sendemails");
	                }
                    
                    	it()->delete('sendemail',$data);

	                $sendemails->delete();
	                return backWithSuccess(trans('admin.deleted'),"sendemails");
                }
            }
            
}