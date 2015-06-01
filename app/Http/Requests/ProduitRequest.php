<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProduitRequest extends Request {

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
			'reference' 	=> 'required',
			'categorie' 	=> 'required|numeric',
			'sousCategorie' => 'required|numeric',
			'marque' 		=> 'required|numeric',
			
			'fournisseur'	=> 'required',
			'montant' 		=> 'required|numeric',
			'nom_1' 		=> 'required',
			'description_1' => 'required'
		];
	}
}