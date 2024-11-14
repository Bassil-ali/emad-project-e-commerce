<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use Validator;
use App\Http\Controllers\Validations\ProductsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ProductsApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Product = Product::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$Product
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(ProductsRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('main_photo')){
              $data['main_photo'] = it()->upload('main_photo','products');
              }else{
                $data['main_photo'] = "";
              }
               if(request()->hasFile('photos')){
              $data['photos'] = it()->upload('photos','products');
              }else{
                $data['photos'] = "";
              }
        $Product = Product::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$Product
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
                $Product = Product::find($id);
            	if(is_null($Product) || empty($Product)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $Product
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
				       foreach (array_keys((new ProductsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(ProductsRequest $request,$id)
            {
            	$Product = Product::find($id);
            	if(is_null($Product) || empty($Product)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('main_photo')){
              it()->delete($Product->main_photo);
              $data['main_photo'] = it()->upload('main_photo','products');
               }
               if(request()->hasFile('photos')){
              it()->delete($Product->photos);
              $data['photos'] = it()->upload('photos','products');
               }
              Product::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $Product
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
               $products = Product::find($id);
            	if(is_null($products) || empty($products)){
            	 return errorResponseJson([]);
            	}


              if(!empty($products->main_photo)){
               it()->delete($products->main_photo);
              }
              if(!empty($products->photos)){
               it()->delete($products->photos);
              }
               it()->delete('product',$id);

               $products->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $products = Product::find($id);
	            	if(is_null($products) || empty($products)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($products->main_photo)){
                    	it()->delete($products->main_photo);
                    	}
                    	if(!empty($products->photos)){
                    	it()->delete($products->photos);
                    	}
                    	it()->delete('product',$id);
                    	@$products->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $products = Product::find($id);
	            	if(is_null($products) || empty($products)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($products->main_photo)){
                    	it()->delete($products->main_photo);
                    	}
                    	if(!empty($products->photos)){
                    	it()->delete($products->photos);
                    	}
                    	it()->delete('product',$data);

                    $products->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}