<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CareersRequest extends FormRequest {

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
             'Full_Name'=>'required',
             'Nationality'=>'required',
             'Occupation'=>'sometimes',
             'Current_Location'=>'sometimes',
             'Age'=>'sometimes',
             'Mobile_Number'=>'sometimes',
             'Email'=>'sometimes',
             'Landline_Number'=>'sometimes',
             'Occupation_Interest'=>'sometimes',
             'attach_cv'=>'required|file',
             'message'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'Full_Name'=>'required',
             'Nationality'=>'required',
             'Occupation'=>'sometimes',
             'Current_Location'=>'sometimes',
             'Age'=>'sometimes',
             'Mobile_Number'=>'sometimes',
             'Email'=>'sometimes',
             'Landline_Number'=>'sometimes',
             'Occupation_Interest'=>'sometimes',
             'attach_cv'=>'required|file',
             'message'=>'',
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
             'Full_Name'=>trans('admin.Full_Name'),
             'Nationality'=>trans('admin.Nationality'),
             'Occupation'=>trans('admin.Occupation'),
             'Current_Location'=>trans('admin.Current_Location'),
             'Age'=>trans('admin.Age'),
             'Mobile_Number'=>trans('admin.Mobile_Number'),
             'Email'=>trans('admin.Email'),
             'Landline_Number'=>trans('admin.Landline_Number'),
             'Occupation_Interest'=>trans('admin.Occupation_Interest'),
             'attach_cv'=>trans('admin.attach_cv'),
             'message'=>trans('admin.message'),
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