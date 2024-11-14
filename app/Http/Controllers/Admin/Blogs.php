<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BlogsDataTable;
use Carbon\Carbon;
use App\Models\Blog;

use App\Http\Controllers\Validations\BlogsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Blogs extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:blogs_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:blogs_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:blogs_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:blogs_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BlogsDataTable $blogs)
            {
               return $blogs->render('admin.blogs.index',['title'=>trans('admin.blogs')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.blogs.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BlogsRequest $request)
            {
                $data = $request->except("_token", "_method");
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
                Blog::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('blogs'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$blogs =  Blog::find($id);
        		return is_null($blogs) || empty($blogs)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.blogs.show',[
				    'title'=>trans('admin.show'),
					'blogs'=>$blogs
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$blogs =  Blog::find($id);
        		return is_null($blogs) || empty($blogs)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.blogs.edit',[
				  'title'=>trans('admin.edit'),
				  'blogs'=>$blogs
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
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
              // Check Record Exists
              $blogs =  Blog::find($id);
              if(is_null($blogs) || empty($blogs)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($blogs->photo);
              $data['photo'] = it()->upload('photo','blogs');
               } 
               if(request()->hasFile('cover')){
              it()->delete($blogs->cover);
              $data['cover'] = it()->upload('cover','blogs');
               } 
              Blog::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('blogs'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $blogs = Blog::find($id);
               if(is_null($blogs) || empty($blogs)){
                return backWithError(trans('admin.undefinedRecord'),"blogs");
               }
                              if(!empty($blogs->photo)){
               it()->delete($blogs->photo);
               }
               if(!empty($blogs->cover)){
               it()->delete($blogs->cover);
               }
               it()->delete('blog',$id);


                $blogs->delete();
                return backWithSuccess(trans('admin.deleted'),"blogs");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$blogs = Blog::find($id);
                    	if(is_null($blogs) || empty($blogs)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	if(!empty($blogs->cover)){
                    	it()->delete($blogs->cover);
                    	}
                    	it()->delete('blog',$id);


		                $blogs->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"blogs");
                }else {
                    $blogs = Blog::find($data);
                    if(is_null($blogs) || empty($blogs)){
	                 return backWithError(trans('admin.undefinedRecord'),"blogs");
	                }
                    
                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	if(!empty($blogs->cover)){
                    	it()->delete($blogs->cover);
                    	}
                    	it()->delete('blog',$data);

	                $blogs->delete();
	                return backWithSuccess(trans('admin.deleted'),"blogs");
                }
            }
            
}