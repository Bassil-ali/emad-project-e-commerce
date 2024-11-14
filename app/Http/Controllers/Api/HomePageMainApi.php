<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HomePage;
use Validator;
use App\Http\Controllers\Validations\HomePageMainRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class HomePageMainApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$HomePage = HomePage::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$HomePage
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(HomePageMainRequest $request)
    {
    	$data = $request->except("_token");
    	
        $HomePage = HomePage::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$HomePage
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
                $HomePage = HomePage::find($id);
            	if(is_null($HomePage) || empty($HomePage)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $HomePage
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
				       foreach (array_keys((new HomePageMainRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(HomePageMainRequest $request,$id)
            {
            	$HomePage = HomePage::find($id);
            	if(is_null($HomePage) || empty($HomePage)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              HomePage::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $HomePage
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
               $homepagemain = HomePage::find($id);
            	if(is_null($homepagemain) || empty($homepagemain)){
            	 return errorResponseJson([]);
            	}


               it()->delete('homepage',$id);

               $homepagemain->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $homepagemain = HomePage::find($id);
	            	if(is_null($homepagemain) || empty($homepagemain)){
	            	 return errorResponseJson([]);
	            	}

                    	it()->delete('homepage',$id);
                    	@$homepagemain->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $homepagemain = HomePage::find($id);
	            	if(is_null($homepagemain) || empty($homepagemain)){
	            	 return errorResponseJson([]);
	            	}
 
                    	it()->delete('homepage',$data);

                    $homepagemain->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}