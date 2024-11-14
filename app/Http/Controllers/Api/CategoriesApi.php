<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Validations\CategoriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class CategoriesApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Category = Category::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Category
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(CategoriesRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','categories');
              }else{
                $data['photo'] = "";
              }
        $Category = Category::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Category
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
                $Category = Category::find($id);
            	if(is_null($Category) || empty($Category)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Category
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
				       foreach (array_keys((new CategoriesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(CategoriesRequest $request,$id)
            {
            	$Category = Category::find($id);
            	if(is_null($Category) || empty($Category)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($Category->photo);
              $data['photo'] = it()->upload('photo','categories');
               }
              Category::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Category
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
               $categories = Category::find($id);
            	if(is_null($categories) || empty($categories)){
            	 return errorResponseJson([]);
            	}


              if(!empty($categories->photo)){
               it()->delete($categories->photo);
              }
               it()->delete('category',$id);

               $categories->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $categories = Category::find($id);
	            	if(is_null($categories) || empty($categories)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($categories->photo)){
                    	it()->delete($categories->photo);
                    	}
                    	it()->delete('category',$id);
                    	@$categories->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $categories = Category::find($id);
	            	if(is_null($categories) || empty($categories)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($categories->photo)){
                    	it()->delete($categories->photo);
                    	}
                    	it()->delete('category',$data);

                    $categories->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}