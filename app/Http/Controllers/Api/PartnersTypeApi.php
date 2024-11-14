<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PartnerType;
use Validator;
use App\Http\Controllers\Validations\PartnersTypeRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class PartnersTypeApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$PartnerType = PartnerType::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$PartnerType
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(PartnersTypeRequest $request)
    {
    	$data = $request->except("_token");
    	
        $PartnerType = PartnerType::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$PartnerType
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
                $PartnerType = PartnerType::find($id);
            	if(is_null($PartnerType) || empty($PartnerType)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $PartnerType
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
				       foreach (array_keys((new PartnersTypeRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(PartnersTypeRequest $request,$id)
            {
            	$PartnerType = PartnerType::find($id);
            	if(is_null($PartnerType) || empty($PartnerType)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              PartnerType::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $PartnerType
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
               $partnerstype = PartnerType::find($id);
            	if(is_null($partnerstype) || empty($partnerstype)){
            	 return errorResponseJson([]);
            	}


               it()->delete('partnertype',$id);

               $partnerstype->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $partnerstype = PartnerType::find($id);
	            	if(is_null($partnerstype) || empty($partnerstype)){
	            	 return errorResponseJson([]);
	            	}

                    	it()->delete('partnertype',$id);
                    	@$partnerstype->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $partnerstype = PartnerType::find($id);
	            	if(is_null($partnerstype) || empty($partnerstype)){
	            	 return errorResponseJson([]);
	            	}
 
                    	it()->delete('partnertype',$data);

                    $partnerstype->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}