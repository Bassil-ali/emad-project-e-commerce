<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlogsRequest extends FormRequest {

	/**
	 * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'name_ar'=>'required',
             'name_en'=>'required',
             'category_id'=>'required',
             'photo'=>'required|'.it()->image().'',
            
             'description_ar'=>'required',
             'description_en'=>'',
             'product_url'=>'',
             'created_date'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'name_ar'=>'required',
             'name_en'=>'required',
             'category_id'=>'required',
             'photo'=>'',
            
             'description_ar'=>'required',
             'description_en'=>'',
             'product_url'=>'',
             'created_date'=>'',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'name_ar'=>trans('admin.name_ar'),
             'name_en'=>trans('admin.name_en'),
             'category_id'=>trans('admin.category_id'),
             'photo'=>trans('admin.photo'),
             'cover'=>trans('admin.cover'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'product_url'=>trans('admin.product_url'),
             'created_date'=>trans('admin.created_date'),
		];
	}

	/**
	 * Baboon Script By [It V 1.6.8 | https://it.phpanonymous.com]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}