<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Banner;
use Validator;
use App\Http\Controllers\Validations\BannersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class BannersApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Banner = Banner::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Banner
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(BannersRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','banners');
              }else{
                $data['photo'] = "";
              }
        $Banner = Banner::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Banner
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
                $Banner = Banner::find($id);
            	if(is_null($Banner) || empty($Banner)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Banner
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
				       foreach (array_keys((new BannersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BannersRequest $request,$id)
            {
            	$Banner = Banner::find($id);
            	if(is_null($Banner) || empty($Banner)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($Banner->photo);
              $data['photo'] = it()->upload('photo','banners');
               }
              Banner::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Banner
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
               $banners = Banner::find($id);
            	if(is_null($banners) || empty($banners)){
            	 return errorResponseJson([]);
            	}


              if(!empty($banners->photo)){
               it()->delete($banners->photo);
              }
               it()->delete('banner',$id);

               $banners->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $banners = Banner::find($id);
	            	if(is_null($banners) || empty($banners)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($banners->photo)){
                    	it()->delete($banners->photo);
                    	}
                    	it()->delete('banner',$id);
                    	@$banners->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $banners = Banner::find($id);
	            	if(is_null($banners) || empty($banners)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($banners->photo)){
                    	it()->delete($banners->photo);
                    	}
                    	it()->delete('banner',$data);

                    $banners->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}