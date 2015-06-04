<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SousCategorie2Request extends Request {

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
            'nom_1' 			=> 'required|max:255',
            'description_1' 	=> 'required',
            'nom_2' 			=> 'required|max:255',
            'description_2' 	=> 'required',
            'nom_3' 			=> 'required|max:255',
            'description_3' 	=> 'required',
            'nom_4' 			=> 'required|max:255',
            'description_4' 	=> 'required'
		];
	}

}