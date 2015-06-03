<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditVenteRequest extends Request {

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
            'livraison_at' => 'required|date',
            'statut' => 'required|max:45',
            'montant' => 'required|numeric',

            'vente_id' => 'numeric',
            'exemplaire_id' => 'numeric',
            'quantite' => 'numeric',
            'montant' => 'numeric'
		];
	}

}
