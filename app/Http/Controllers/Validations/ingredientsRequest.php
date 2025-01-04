<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ingredientsRequest extends FormRequest {

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
             'Allergens_ar'=>'string',
             'Allergens_en'=>'string',
             'Calories_per_serving_ar'=>'string',
             'Calories_per_serving_en'=>'string',
             'Barcode'=>'required|string',
             'Size'=>'string',
             'Packing_ar'=>'string',
             'Packing_en'=>'string',
		];
	}

	protected function onUpdate() {
		return [
             'Allergens_ar'=>'string',
             'Allergens_en'=>'string',
             'Calories_per_serving_ar'=>'string',
             'Calories_per_serving_en'=>'string',
             'Barcode'=>'required|string',
             'Size'=>'string',
             'Packing_ar'=>'string',
             'Packing_en'=>'string',
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
             'Allergens_ar'=>trans('admin.Allergens_ar'),
             'Allergens_en'=>trans('admin.Allergens_en'),
             'Calories_per_serving_ar'=>trans('admin.Calories_per_serving_ar'),
             'Calories_per_serving_en'=>trans('admin.Calories_per_serving_en'),
             'Barcode'=>trans('admin.Barcode'),
             'Size'=>trans('admin.Size'),
             'Packing_ar'=>trans('admin.Packing_ar'),
             'Packing_en'=>trans('admin.Packing_en'),
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