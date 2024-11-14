<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DistributorsBanner;
use Validator;
use App\Http\Controllers\Validations\DistributorsBannersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class DistributorsBannersApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$DistributorsBanner = DistributorsBanner::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$DistributorsBanner
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(DistributorsBannersRequest $request)
    {
    	$data = $request->except("_token");
    	
        $DistributorsBanner = DistributorsBanner::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$DistributorsBanner
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
                $DistributorsBanner = DistributorsBanner::find($id);
            	if(is_null($DistributorsBanner) || empty($DistributorsBanner)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $DistributorsBanner
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
				       foreach (array_keys((new DistributorsBannersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(DistributorsBannersRequest $request,$id)
            {
            	$DistributorsBanner = DistributorsBanner::find($id);
            	if(is_null($DistributorsBanner) || empty($DistributorsBanner)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              DistributorsBanner::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $DistributorsBanner
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
               $distributorsbanners = DistributorsBanner::find($id);
            	if(is_null($distributorsbanners) || empty($distributorsbanners)){
            	 return errorResponseJson([]);
            	}


               it()->delete('distributorsbanner',$id);

               $distributorsbanners->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $distributorsbanners = DistributorsBanner::find($id);
	            	if(is_null($distributorsbanners) || empty($distributorsbanners)){
	            	 return errorResponseJson([]);
	            	}

                    	it()->delete('distributorsbanner',$id);
                    	@$distributorsbanners->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $distributorsbanners = DistributorsBanner::find($id);
	            	if(is_null($distributorsbanners) || empty($distributorsbanners)){
	            	 return errorResponseJson([]);
	            	}
 
                    	it()->delete('distributorsbanner',$data);

                    $distributorsbanners->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}