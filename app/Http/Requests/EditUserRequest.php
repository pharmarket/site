<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request {

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
		            'mail' => 'required|email',
		            'pseudo' => 'alpha_dash',
		            'pays_id' => 'required|numeric',
		            'ville' => 'required|alpha',
		            'cp' => 'required|numeric',
		            'adresse' => 'required'
		];
	}

}
