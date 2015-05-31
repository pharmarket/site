<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FournisseurRequest extends Request {

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
			'siret' => 'required|max:14|unique:fournisseur|regex:/^[a-zA-Z0-9]/',
            'nom' => 'required|max:45',
            'adresse' => 'required|max:100',
            'cp' => 'required|numeric',
            'ville' => 'required|max:45',
            'phone' => 'required|numeric',
            'contact' => 'required|max:45',
            'commentaire' => 'required'
		];
	}

}
