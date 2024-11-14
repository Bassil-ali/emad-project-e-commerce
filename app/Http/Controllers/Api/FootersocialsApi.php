<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Footersocial;
use Validator;
use App\Http\Controllers\Validations\FootersocialsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class FootersocialsApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Footersocial = Footersocial::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Footersocial
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(FootersocialsRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','footersocials');
              }else{
                $data['photo'] = "";
              }
        $Footersocial = Footersocial::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Footersocial
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
                $Footersocial = Footersocial::find($id);
            	if(is_null($Footersocial) || empty($Footersocial)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Footersocial
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
				       foreach (array_keys((new FootersocialsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(FootersocialsRequest $request,$id)
            {
            	$Footersocial = Footersocial::find($id);
            	if(is_null($Footersocial) || empty($Footersocial)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($Footersocial->photo);
              $data['photo'] = it()->upload('photo','footersocials');
               }
              Footersocial::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Footersocial
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
               $footersocials = Footersocial::find($id);
            	if(is_null($footersocials) || empty($footersocials)){
            	 return errorResponseJson([]);
            	}


              if(!empty($footersocials->photo)){
               it()->delete($footersocials->photo);
              }
               it()->delete('footersocial',$id);

               $footersocials->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $footersocials = Footersocial::find($id);
	            	if(is_null($footersocials) || empty($footersocials)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($footersocials->photo)){
                    	it()->delete($footersocials->photo);
                    	}
                    	it()->delete('footersocial',$id);
                    	@$footersocials->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $footersocials = Footersocial::find($id);
	            	if(is_null($footersocials) || empty($footersocials)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($footersocials->photo)){
                    	it()->delete($footersocials->photo);
                    	}
                    	it()->delete('footersocial',$data);

                    $footersocials->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}