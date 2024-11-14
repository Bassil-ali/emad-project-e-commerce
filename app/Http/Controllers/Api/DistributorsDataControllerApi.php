<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DistributorsData;
use Validator;
use App\Http\Controllers\Validations\DistributorsDataControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class DistributorsDataControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$DistributorsData = DistributorsData::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$DistributorsData
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(DistributorsDataControllerRequest $request)
    {
    	$data = $request->except("_token");
    	
        $DistributorsData = DistributorsData::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$DistributorsData
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
                $DistributorsData = DistributorsData::find($id);
            	if(is_null($DistributorsData) || empty($DistributorsData)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $DistributorsData
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
				       foreach (array_keys((new DistributorsDataControllerRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(DistributorsDataControllerRequest $request,$id)
            {
            	$DistributorsData = DistributorsData::find($id);
            	if(is_null($DistributorsData) || empty($DistributorsData)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              DistributorsData::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $DistributorsData
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
               $distributorsdata = DistributorsData::find($id);
            	if(is_null($distributorsdata) || empty($distributorsdata)){
            	 return errorResponseJson([]);
            	}


               it()->delete('distributorsdata',$id);

               $distributorsdata->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $distributorsdata = DistributorsData::find($id);
	            	if(is_null($distributorsdata) || empty($distributorsdata)){
	            	 return errorResponseJson([]);
	            	}

                    	it()->delete('distributorsdata',$id);
                    	@$distributorsdata->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $distributorsdata = DistributorsData::find($id);
	            	if(is_null($distributorsdata) || empty($distributorsdata)){
	            	 return errorResponseJson([]);
	            	}
 
                    	it()->delete('distributorsdata',$data);

                    $distributorsdata->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}