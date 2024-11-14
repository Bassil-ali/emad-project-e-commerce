<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Career;
use Validator;
use App\Http\Controllers\Validations\CareersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class CareersApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Career = Career::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Career
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(CareersRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('attach_cv')){
              $data['attach_cv'] = it()->upload('attach_cv','careers');
              }else{
                $data['attach_cv'] = "";
              }
        $Career = Career::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Career
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
                $Career = Career::find($id);
            	if(is_null($Career) || empty($Career)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Career
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
				       foreach (array_keys((new CareersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(CareersRequest $request,$id)
            {
            	$Career = Career::find($id);
            	if(is_null($Career) || empty($Career)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('attach_cv')){
              it()->delete($Career->attach_cv);
              $data['attach_cv'] = it()->upload('attach_cv','careers');
               }
              Career::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Career
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
               $careers = Career::find($id);
            	if(is_null($careers) || empty($careers)){
            	 return errorResponseJson([]);
            	}


              if(!empty($careers->attach_cv)){
               it()->delete($careers->attach_cv);
              }
               it()->delete('career',$id);

               $careers->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $careers = Career::find($id);
	            	if(is_null($careers) || empty($careers)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($careers->attach_cv)){
                    	it()->delete($careers->attach_cv);
                    	}
                    	it()->delete('career',$id);
                    	@$careers->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $careers = Career::find($id);
	            	if(is_null($careers) || empty($careers)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($careers->attach_cv)){
                    	it()->delete($careers->attach_cv);
                    	}
                    	it()->delete('career',$data);

                    $careers->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}