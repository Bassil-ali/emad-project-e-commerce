<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ClientPhoto;
use Validator;
use App\Http\Controllers\Validations\ClientPhotosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ClientPhotosApi extends Controller
{

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$ClientPhoto = ClientPhoto::orderBy('id','desc')->paginate(15);
               return response([
               "status"=>true,
               "statusCode"=>200,
               "data"=>$ClientPhoto
               ],200);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(ClientPhotosRequest $request)
    {
    	$data = $request->except("_token");
    	
               if(request()->hasFile('client_photo')){
              $data['client_photo'] = it()->upload('client_photo','clientphotos');
              }else{
                $data['client_photo'] = "";
              }
        $ClientPhoto = ClientPhoto::create($data); 

        return response([
            "status"=>true,
            "statusCode"=>200,
            "message"=>trans('admin.added'),
            "data"=>$ClientPhoto
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
                $ClientPhoto = ClientPhoto::find($id);
            	if(is_null($ClientPhoto) || empty($ClientPhoto)){
            	 return errorResponseJson([]);
            	}

                 return response([
              "status"=>true,
              "statusCode"=>200,
              "data"=> $ClientPhoto
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
				       foreach (array_keys((new ClientPhotosRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(ClientPhotosRequest $request,$id)
            {
            	$ClientPhoto = ClientPhoto::find($id);
            	if(is_null($ClientPhoto) || empty($ClientPhoto)){
            	 return errorResponseJson([]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile('client_photo')){
              it()->delete($ClientPhoto->client_photo);
              $data['client_photo'] = it()->upload('client_photo','clientphotos');
               }
              ClientPhoto::where('id',$id)->update($data);

              return response([
               "status"=>true,
               "statusCode"=>200,
               "message"=>trans('admin.updated'),
               "data"=> $ClientPhoto
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
               $clientphotos = ClientPhoto::find($id);
            	if(is_null($clientphotos) || empty($clientphotos)){
            	 return errorResponseJson([]);
            	}


              if(!empty($clientphotos->client_photo)){
               it()->delete($clientphotos->client_photo);
              }
               it()->delete('clientphoto',$id);

               $clientphotos->delete();
               return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
            }



 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    $clientphotos = ClientPhoto::find($id);
	            	if(is_null($clientphotos) || empty($clientphotos)){
	            	 return errorResponseJson([]);
	            	}

                    	if(!empty($clientphotos->client_photo)){
                    	it()->delete($clientphotos->client_photo);
                    	}
                    	it()->delete('clientphoto',$id);
                    	@$clientphotos->delete();
                    }
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')]);
                }else {
                    $clientphotos = ClientPhoto::find($id);
	            	if(is_null($clientphotos) || empty($clientphotos)){
	            	 return errorResponseJson([]);
	            	}
 
                    	if(!empty($clientphotos->client_photo)){
                    	it()->delete($clientphotos->client_photo);
                    	}
                    	it()->delete('clientphoto',$data);

                    $clientphotos->delete();
                    return response(["status"=>true,"statusCode"=>200,"message"=>trans('admin.deleted')],200);
                }
            }

            
}