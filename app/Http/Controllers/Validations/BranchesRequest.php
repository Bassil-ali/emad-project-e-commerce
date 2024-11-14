<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BranchesRequest extends FormRequest {

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
             'url_location' => 'required',
             'address_ar'=>'required',
             'address_en'=>'required',
             'call_us'=>'required',
             'open_hours'=>'required',
		];
	}

	protected function onUpdate() {
		return [
             'name_ar'=>'required',
             'name_en'=>'required',
			 'url_location' => 'required',
             'address_ar'=>'required',
             'address_en'=>'required',
             'call_us'=>'required',
             'open_hours'=>'required',
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
             'url_location' => trans('admin.url_location'),
             'address_ar'=>trans('admin.address_ar'),
             'address_en'=>trans('admin.address_en'),
             'call_us'=>trans('admin.call_us'),
             'open_hours'=>trans('admin.open_hours'),
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