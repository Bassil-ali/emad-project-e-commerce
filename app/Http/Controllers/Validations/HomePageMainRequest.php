<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomePageMainRequest extends FormRequest {

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
             'first_title_ar'=>'required',
             'description_ar'=>'required',
             'second_title_ar'=>'required',
             'YouTupe_url'=>'',
             'workers'=>'required',
             'certificates'=>'required|numeric',
             'clients'=>'required|numeric',
             'first_title_en'=>'required',
             'description_en'=>'required',
             'second_title_en'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'first_title_ar'=>'required',
             'description_ar'=>'required',
             'second_title_ar'=>'required',
             'YouTupe_url'=>'',
             'workers'=>'required',
             'certificates'=>'required|numeric',
             'clients'=>'required|numeric',
             'first_title_en'=>'required',
             'description_en'=>'required',
             'second_title_en'=>'',
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
             'first_title_ar'=>trans('admin.first_title_ar'),
             'description_ar'=>trans('admin.description_ar'),
             'second_title_ar'=>trans('admin.second_title_ar'),
             'YouTupe_url'=>trans('admin.YouTupe_url'),
             'workers'=>trans('admin.workers'),
             'certificates'=>trans('admin.certificates'),
             'clients'=>trans('admin.clients'),
             'first_title_en'=>trans('admin.first_title_en'),
             'description_en'=>trans('admin.description_en'),
             'second_title_en'=>trans('admin.second_title_en'),
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