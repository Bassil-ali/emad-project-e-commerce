<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ServedIndustrie;
use Validator;
use App\Http\Controllers\Validations\ServedIndustriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ServedIndustriesApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$ServedIndustrie = ServedIndustrie::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$ServedIndustrie
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(ServedIndustriesRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','servedindustries');
              }else{
                $data['photo'] = "";
              }
        $ServedIndustrie = ServedIndustrie::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$ServedIndustrie
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
                $ServedIndustrie = ServedIndustrie::find($id);
            	if(is_null($ServedIndustrie) || empty($ServedIndustrie)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $ServedIndustrie
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
				       foreach (array_keys((new ServedIndustriesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(ServedIndustriesRequest $request,$id)
            {
            	$ServedIndustrie = ServedIndustrie::find($id);
            	if(is_null($ServedIndustrie) || empty($ServedIndustrie)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($ServedIndustrie->photo);
              $data['photo'] = it()->upload('photo','servedindustries');
               }
              ServedIndustrie::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $ServedIndustrie
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
               $servedindustries = ServedIndustrie::find($id);
            	if(is_null($servedindustries) || empty($servedindustries)){
            	 return errorResponseJson([]);
            	}


              if(!empty($servedindustries->photo)){
               it()->delete($servedindustries->photo);
              }
               it()->delete('servedindustrie',$id);

               $servedindustries->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $servedindustries = ServedIndustrie::find($id);
	            	if(is_null($servedindustries) || empty($servedindustries)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($servedindustries->photo)){
                    	it()->delete($servedindustries->photo);
                    	}
                    	it()->delete('servedindustrie',$id);
                    	@$servedindustries->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $servedindustries = ServedIndustrie::find($id);
	            	if(is_null($servedindustries) || empty($servedindustries)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($servedindustries->photo)){
                    	it()->delete($servedindustries->photo);
                    	}
                    	it()->delete('servedindustrie',$data);

                    $servedindustries->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}