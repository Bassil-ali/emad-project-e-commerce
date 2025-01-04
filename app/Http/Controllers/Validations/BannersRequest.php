<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BannersRequest extends FormRequest {

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
             'photo'=>'file|'.it()->image().'',
             'title_en'=>'',
             'description_en'=>'',
             'action_url'=>'',
             'title_ar'=>'required',
             'Description_ar'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'photo'=>'file|'.it()->image().'',
             'title_en'=>'',
             'description_en'=>'',
             'action_url'=>'',
             'title_ar'=>'required',
             'Description_ar'=>'',
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
             'photo'=>trans('admin.photo'),
             'title_en'=>trans('admin.title_en'),
             'description_en'=>trans('admin.description_en'),
             'action_url'=>trans('admin.action_url'),
             'title_ar'=>trans('admin.title_ar'),
             'Description_ar'=>trans('admin.Description_ar'),
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