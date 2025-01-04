<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\vedio;
use Validator;
use App\Http\Controllers\Validations\vediosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class vediosApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$vedio = vedio::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$vedio
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(vediosRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('vedio')){
              $data['vedio'] = it()->upload('vedio','vedios');
              }else{
                $data['vedio'] = "";
              }
        $vedio = vedio::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$vedio
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
                $vedio = vedio::find($id);
            	if(is_null($vedio) || empty($vedio)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $vedio
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
				       foreach (array_keys((new vediosRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(vediosRequest $request,$id)
            {
            	$vedio = vedio::find($id);
            	if(is_null($vedio) || empty($vedio)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('vedio')){
              it()->delete($vedio->vedio);
              $data['vedio'] = it()->upload('vedio','vedios');
               }
              vedio::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $vedio
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
               $vedios = vedio::find($id);
            	if(is_null($vedios) || empty($vedios)){
            	 return errorResponseJson([]);
            	}


              if(!empty($vedios->vedio)){
               it()->delete($vedios->vedio);
              }
               it()->delete('vedio',$id);

               $vedios->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $vedios = vedio::find($id);
	            	if(is_null($vedios) || empty($vedios)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($vedios->vedio)){
                    	it()->delete($vedios->vedio);
                    	}
                    	it()->delete('vedio',$id);
                    	@$vedios->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $vedios = vedio::find($id);
	            	if(is_null($vedios) || empty($vedios)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($vedios->vedio)){
                    	it()->delete($vedios->vedio);
                    	}
                    	it()->delete('vedio',$data);

                    $vedios->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}