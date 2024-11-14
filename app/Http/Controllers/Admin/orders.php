<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ordersDataTable;
use Carbon\Carbon;
use App\Models\order;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Validations\ordersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class orders extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:orders_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:orders_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:orders_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:orders_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ordersDataTable $orders)
            {
               return $orders->render('admin.orders.index',['title'=>trans('admin.orders')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.orders.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ordersRequest $request)
            {
                $data = $request->except("_token", "_method");
                $order =        order::create($data); 
                               // Send email to the manager
              Mail::to(['info@emadbakeries.com', 'media@emadbakeries.com', 'bilal.abozid@emadbakeries.com'])
              ->send(new OrderNotification($order));
                           
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('orders'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$orders =  order::find($id);
        		return is_null($orders) || empty($orders)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.orders.show',[
				    'title'=>trans('admin.show'),
					'orders'=>$orders
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$orders =  order::find($id);
        		return is_null($orders) || empty($orders)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.orders.edit',[
				  'title'=>trans('admin.edit'),
				  'orders'=>$orders
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
				foreach (array_keys((new ordersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ordersRequest $request,$id)
            {
              // Check Record Exists
              $orders =  order::find($id);
              if(is_null($orders) || empty($orders)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              order::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('orders'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orders = order::find($id);
               if(is_null($orders) || empty($orders)){
                return backWithError(trans('admin.undefinedRecord'),"orders");
               }
                              it()->delete('order',$id);


                $orders->delete();
                return backWithSuccess(trans('admin.deleted'),"orders");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$orders = order::find($id);
                    	if(is_null($orders) || empty($orders)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('order',$id);


		                $orders->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"orders");
                }else {
                    $orders = order::find($data);
                    if(is_null($orders) || empty($orders)){
	                 return backWithError(trans('admin.undefinedRecord'),"orders");
	                }
                    
                    	it()->delete('order',$data);

	                $orders->delete();
	                return backWithSuccess(trans('admin.deleted'),"orders");
                }
            }
            
}