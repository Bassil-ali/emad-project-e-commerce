<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomePageRequest extends FormRequest {

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
             'first_title'=>'required',
             'description'=>'required',
             'second_title'=>'required',
             'client_photo'=>'required|'.it()->image().'',
             'vedio'=>'required|mp4',
             'workers'=>'required|numeric',
             'certificates'=>'required|numeric',
             'clients'=>'required|numeric',
		];
	}

	protected function onUpdate() {
		return [
             'first_title'=>'required',
             'description'=>'required',
             'second_title'=>'required',
             'client_photo'=>'required|'.it()->image().'',
             'vedio'=>'required|mp4',
             'workers'=>'required|numeric',
             'certificates'=>'required|numeric',
             'clients'=>'required|numeric',
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
             'first_title'=>trans('admin.first_title'),
             'description'=>trans('admin.description'),
             'second_title'=>trans('admin.second_title'),
             'client_photo'=>trans('admin.client_photo'),
             'vedio'=>trans('admin.vedio'),
             'workers'=>trans('admin.workers'),
             'certificates'=>trans('admin.certificates'),
             'clients'=>trans('admin.clients'),
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