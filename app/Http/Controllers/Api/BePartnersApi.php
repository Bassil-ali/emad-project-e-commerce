<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BePartner;
use Validator;
use App\Http\Controllers\Validations\BePartnersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class BePartnersApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$BePartner = BePartner::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$BePartner
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(BePartnersRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','bepartners');
              }else{
                $data['photo'] = "";
              }
        $BePartner = BePartner::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$BePartner
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
                $BePartner = BePartner::find($id);
            	if(is_null($BePartner) || empty($BePartner)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $BePartner
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
				       foreach (array_keys((new BePartnersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BePartnersRequest $request,$id)
            {
            	$BePartner = BePartner::find($id);
            	if(is_null($BePartner) || empty($BePartner)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($BePartner->photo);
              $data['photo'] = it()->upload('photo','bepartners');
               }
              BePartner::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $BePartner
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
               $bepartners = BePartner::find($id);
            	if(is_null($bepartners) || empty($bepartners)){
            	 return errorResponseJson([]);
            	}


              if(!empty($bepartners->photo)){
               it()->delete($bepartners->photo);
              }
               it()->delete('bepartner',$id);

               $bepartners->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $bepartners = BePartner::find($id);
	            	if(is_null($bepartners) || empty($bepartners)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($bepartners->photo)){
                    	it()->delete($bepartners->photo);
                    	}
                    	it()->delete('bepartner',$id);
                    	@$bepartners->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $bepartners = BePartner::find($id);
	            	if(is_null($bepartners) || empty($bepartners)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($bepartners->photo)){
                    	it()->delete($bepartners->photo);
                    	}
                    	it()->delete('bepartner',$data);

                    $bepartners->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}