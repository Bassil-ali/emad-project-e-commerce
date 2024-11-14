<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Blog;
use Validator;
use App\Http\Controllers\Validations\BlogsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class BlogsApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Blog = Blog::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Blog
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(BlogsRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','blogs');
              }else{
                $data['photo'] = "";
              }
               if(request()->hasFile('cover')){
              $data['cover'] = it()->upload('cover','blogs');
              }else{
                $data['cover'] = "";
              }
        $Blog = Blog::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Blog
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
                $Blog = Blog::find($id);
            	if(is_null($Blog) || empty($Blog)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Blog
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
				       foreach (array_keys((new BlogsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BlogsRequest $request,$id)
            {
            	$Blog = Blog::find($id);
            	if(is_null($Blog) || empty($Blog)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('photo')){
              it()->delete($Blog->photo);
              $data['photo'] = it()->upload('photo','blogs');
               }
               if(request()->hasFile('cover')){
              it()->delete($Blog->cover);
              $data['cover'] = it()->upload('cover','blogs');
               }
              Blog::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Blog
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
               $blogs = Blog::find($id);
            	if(is_null($blogs) || empty($blogs)){
            	 return errorResponseJson([]);
            	}


              if(!empty($blogs->photo)){
               it()->delete($blogs->photo);
              }
              if(!empty($blogs->cover)){
               it()->delete($blogs->cover);
              }
               it()->delete('blog',$id);

               $blogs->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $blogs = Blog::find($id);
	            	if(is_null($blogs) || empty($blogs)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	if(!empty($blogs->cover)){
                    	it()->delete($blogs->cover);
                    	}
                    	it()->delete('blog',$id);
                    	@$blogs->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $blogs = Blog::find($id);
	            	if(is_null($blogs) || empty($blogs)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	if(!empty($blogs->cover)){
                    	it()->delete($blogs->cover);
                    	}
                    	it()->delete('blog',$data);

                    $blogs->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}