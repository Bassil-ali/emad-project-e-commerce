<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductsRequest extends FormRequest {

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
             'Name_ar'=>'required',
             'name_en'=>'required',
             'title_ar'=>'required',
             'title_en'=>'required',
             'main_photo'=>'required|'.it()->image().'',
             'photos'=>'required',
             'price'=>'',
             'number_of_calories'=>'',
             'description_ar'=>'',
             'description_en'=>'',
			 'category_id' => 'required'
             
		];
	}

	protected function onUpdate() {
		return [
             'Name_ar'=>'required',
             'name_en'=>'required',
             'title_ar'=>'required',
             'title_en'=>'required',
             'main_photo'=>'|'.it()->image().'',
             'photos'=>'',
             'price'=>'',
             'number_of_calories'=>'',
             'description_ar'=>'',
             'description_en'=>'',
			 'category_id' => 'required'
             
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
             'Name_ar'=>trans('admin.Name_ar'),
             'name_en'=>trans('admin.name_en'),
             'title_ar'=>trans('admin.title_ar'),
             'title_en'=>trans('admin.title_en'),
             'main_photo'=>trans('admin.main_photo'),
             'photos'=>trans('admin.photos'),
             'price'=>trans('admin.price'),
             'number_of_calories'=>trans('admin.number_of_calories'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'ingredient_id'=>trans('admin.ingredient_id'),
			 'category_id' =>trans('admin.category_id'),
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