<?php namespace App\Http\Requests;
//REQUEST
use App\Http\Requests\Request;

class VilleRequest extends Request {

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
            'pays_id' => 'required|numeric',
            'nom' => 'required|alpha|unique:ville',
            'cp' => 'required|numeric',
            'adresse' => 'required'
		];
	}

}
