<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ingredientsDataTable;
use Carbon\Carbon;
use App\Models\ingredient;

use App\Http\Controllers\Validations\ingredientsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ingredients extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:ingredients_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:ingredients_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:ingredients_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:ingredients_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ingredientsDataTable $ingredients)
            {
               return $ingredients->render('admin.ingredients.index',['title'=>trans('admin.ingredients')]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.ingredients.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ingredientsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	                ingredient::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('ingredients'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$ingredients =  ingredient::find($id);
        		return is_null($ingredients) || empty($ingredients)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.ingredients.show',[
				    'title'=>trans('admin.show'),
					'ingredients'=>$ingredients
        		]);
            }


            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$ingredients =  ingredient::find($id);
        		return is_null($ingredients) || empty($ingredients)?
        		backWithError(trans("admin.undefinedRecord")) :
        		view('admin.ingredients.edit',[
				  'title'=>trans('admin.edit'),
				  'ingredients'=>$ingredients
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
				foreach (array_keys((new ingredientsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ingredientsRequest $request,$id)
            {
              // Check Record Exists
              $ingredients =  ingredient::find($id);
              if(is_null($ingredients) || empty($ingredients)){
              	return backWithError(trans("admin.undefinedRecord"));
              }
              $data = $this->updateFillableColumns(); 
              ingredient::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('ingredients'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $ingredients = ingredient::find($id);
               if(is_null($ingredients) || empty($ingredients)){
                return backWithError(trans('admin.undefinedRecord'),"ingredients");
               }
                              it()->delete('ingredient',$id);


                $ingredients->delete();
                return backWithSuccess(trans('admin.deleted'),"ingredients");

            }


 			public function multi_delete()
            {
                $data = request('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$ingredients = ingredient::find($id);
                    	if(is_null($ingredients) || empty($ingredients)){
		                 return backWithError(trans('admin.undefinedRecord'));
		                }
                    	                    	it()->delete('ingredient',$id);


		                $ingredients->delete();

                    }
                    return backWithSuccess(trans('admin.deleted'),"ingredients");
                }else {
                    $ingredients = ingredient::find($data);
                    if(is_null($ingredients) || empty($ingredients)){
	                 return backWithError(trans('admin.undefinedRecord'),"ingredients");
	                }
                    
                    	it()->delete('ingredient',$data);

	                $ingredients->delete();
	                return backWithSuccess(trans('admin.deleted'),"ingredients");
                }
            }
            
}