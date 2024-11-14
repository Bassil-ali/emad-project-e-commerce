<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ProductsDataTable;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Validations\ProductsRequest;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Products extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminRole:products_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:products_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:products_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:products_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);
    }



    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $products)
    {
        return $products->render('admin.products.index', ['title' => trans('admin.products')]);
    }


    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Or Redirect
     */
    public function store(ProductsRequest $request)
    {
        $data = $request->except("_token", "_method");
        if (request()->hasFile('main_photo')) {
            $data['main_photo'] = it()->upload('main_photo', 'products');
        } else {
            $data['main_photo'] = "";
        }
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = it()->upload($photo, 'products');
            }
            $data['photos'] = json_encode($photos); // Encode array into JSON format
        } else {
            $data['photos'] = json_encode([]); // Store an empty array if no photos are uploaded
        }



        $product = Product::create($data);
        // Attach the ingredients to the product
        $product->ingredients()->attach($request->input('ingredient_id'));

        $redirect = isset($request["add_back"]) ? "/create" : "";
        return redirectWithSuccess(aurl('products' . $redirect), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return is_null($products) || empty($products) ?
            backWithError(trans("admin.undefinedRecord")) :
            view('admin.products.show', [
                'title' => trans('admin.show'),
                'products' => $products
            ]);
    }


    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return is_null($products) || empty($products) ?
            backWithError(trans("admin.undefinedRecord")) :
            view('admin.products.edit', [
                'title' => trans('admin.edit'),
                'products' => $products
            ]);
    }


    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns()
    {
        $fillableCols = [];
        foreach (array_keys((new ProductsRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    public function update(ProductsRequest $request, $id)
    {
        // Check Record Exists
        $products = Product::findOrFail($id); // Fetch the product model instance
        if (is_null($products) || empty($products)) {
            return backWithError(trans("admin.undefinedRecord"));
        }
        $data = $this->updateFillableColumns();
        if (request()->hasFile('main_photo')) {
            it()->delete($products->main_photo);
            $data['main_photo'] = it()->upload('main_photo', 'products');
        }

        // Handle photo removal
        if ($request->has('remove_photos')) {
            $photos = json_decode($products->photos, true);

            foreach ($request->input('remove_photos') as $photo) {
                // Remove photo from storage
                if (($key = array_search($photo, $photos)) !== false) {
                    unset($photos[$key]);
                    Storage::delete('products/' . $photo); // Remove file from storage
                }
            }

            $products->photos = json_encode(array_values($photos)); // Re-encode photos
        }

        // Handle new photo uploads
        if ($request->hasFile('photos')) {
            $newPhotos = [];

            foreach ($request->file('photos') as $photo) {
                $newPhotos[] = it()->upload($photo, 'products'); // Upload new photos and store their paths
            }

            // Merge the new photos with existing ones
            $currentPhotos = json_decode($products->photos, true);
            $allPhotos = array_merge($currentPhotos ?? [], $newPhotos);
            $products->photos = json_encode($allPhotos);
        }


        $data['photos'] = $products->photos; // Store updated photos


        $products->where('id', $id)->update($data);

        // Sync the selected ingredients

        $products->ingredients()->sync($request->input('ingredient'));

        $redirect = isset($request["save_back"]) ? "/" . $id . "/edit" : "";
        return redirectWithSuccess(aurl('products' . $redirect), trans('admin.updated'));
    }

    /**
     * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if (is_null($products) || empty($products)) {
            return backWithError(trans('admin.undefinedRecord'), "products");
        }
        if (!empty($products->main_photo)) {
            it()->delete($products->main_photo);
        }
        if (!empty($products->photos)) {
            it()->delete($products->photos);
        }
        it()->delete('product', $id);


        $products->delete();
        return backWithSuccess(trans('admin.deleted'), "products");

    }


    public function multi_delete()
    {
        $data = request('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $products = Product::find($id);
                if (is_null($products) || empty($products)) {
                    return backWithError(trans('admin.undefinedRecord'));
                }
                if (!empty($products->main_photo)) {
                    it()->delete($products->main_photo);
                }
                if (!empty($products->photos)) {
                    it()->delete($products->photos);
                }
                it()->delete('product', $id);


                $products->delete();

            }
            return backWithSuccess(trans('admin.deleted'), "products");
        } else {
            $products = Product::find($data);
            if (is_null($products) || empty($products)) {
                return backWithError(trans('admin.undefinedRecord'), "products");
            }

            if (!empty($products->main_photo)) {
                it()->delete($products->main_photo);
            }
            if (!empty($products->photos)) {
                it()->delete($products->photos);
            }
            it()->delete('product', $data);

            $products->delete();
            return backWithSuccess(trans('admin.deleted'), "products");
        }
    }

}