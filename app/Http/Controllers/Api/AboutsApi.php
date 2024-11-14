<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About;
use Validator;
use App\Http\Controllers\Validations\AboutsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class AboutsApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$About = About::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$About
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(AboutsRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','abouts');
              }else{
                $data['photo'] = "";
              }
        $About = About::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$About
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
                $About = About::find($id);
            	if(is_null($About) || empty($About)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $About
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
				       foreach (array_keys((new AboutsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(AboutsRequest $request,$id)
            {
            	$About = About::find($id);
            	if(is_null($About) || empty($About)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($About->photo);
              $data['photo'] = it()->upload('photo','abouts');
               }
              About::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $About
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
               $abouts = About::find($id);
            	if(is_null($abouts) || empty($abouts)){
            	 return errorResponseJson([]);
            	}


              if(!empty($abouts->photo)){
               it()->delete($abouts->photo);
              }
               it()->delete('about',$id);

               $abouts->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $abouts = About::find($id);
	            	if(is_null($abouts) || empty($abouts)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete('about',$id);
                    	@$abouts->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $abouts = About::find($id);
	            	if(is_null($abouts) || empty($abouts)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete('about',$data);

                    $abouts->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}