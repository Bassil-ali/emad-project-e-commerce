<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\SendEmail;
use Validator;
use App\Http\Controllers\Validations\SendEmailsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class SendEmailsApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$SendEmail = SendEmail::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$SendEmail
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(SendEmailsRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data['user_id'] = auth()->id(); 
        $SendEmail = SendEmail::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$SendEmail
        ],200);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $SendEmail = SendEmail::find($id);
            	if(is_null($SendEmail) || empty($SendEmail)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $SendEmail
              ],200);  ;
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
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
            	$SendEmail = SendEmail::find($id);
            	if(is_null($SendEmail) || empty($SendEmail)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data['user_id'] = auth()->id(); 
              SendEmail::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $SendEmail
               ],200);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $sendemails = SendEmail::find($id);
            	if(is_null($sendemails) || empty($sendemails)){
            	 return errorResponseJson([]);
            	}


               it()->delete('sendemail',$id);

               $sendemails->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $sendemails = SendEmail::find($id);
	            	if(is_null($sendemails) || empty($sendemails)){
	            	 return errorResponseJson([]);
	            	}

                    	it()->delete('sendemail',$id);
                    	@$sendemails->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $sendemails = SendEmail::find($id);
	            	if(is_null($sendemails) || empty($sendemails)){
	            	 return errorResponseJson([]);
	            	}
 
                    	it()->delete('sendemail',$data);

                    $sendemails->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}