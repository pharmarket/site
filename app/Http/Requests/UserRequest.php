<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'role_id' => 'required|numeric',
            'ville_id' => 'required|numeric',
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'mail' => 'required|email|unique:user',
            'password' => 'required|min:6|alpha_dash',
            'password2' => 'required|min:6|alpha_dash',
            'pseudo' => 'alpha_dash',
            'avatar' => '',
            'birth' => 'required|date|after:1900-01-01|before:now',
            'phone' => 'required_without:mobile|numeric',
            'mobile' => 'required_without:phone|numeric'
		];
	}

}
