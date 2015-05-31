<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VenteRequest extends Request {

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
			'devise_id' => 'required|numeric',
            'entrepot_id' => 'required|numeric',
            'fournisseur_id' => 'required|numeric',
            'reference' => 'required|max:45|unique:vente|regex:/^[a-zA-Z0-9]/',
            'commande_at' => 'required|date',
            'livraison_at' => 'required|date',
            'statut' => 'required|max:45',
            'montant' => 'required|numeric'
		];
	}

}
