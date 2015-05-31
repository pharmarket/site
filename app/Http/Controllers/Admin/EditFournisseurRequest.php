<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditFournisseurRequest extends Request {

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
            'nom' => 'required|max:45',
            'adresse' => 'required|max:100',
            'cp' => 'required|numeric',
            'ville' => 'required|max:45',
            'phone' => 'required|numeric',
            'contact' => 'max:45',
            'commentaire' => '',

            'fournisseur_id' => 'numeric',
            'devise_id' => 'numeric',
            'entrepot_id' => 'numeric',
            'commande_at' => 'date',
            'livraison_at' => 'date',
            'statut' => 'max:45',
            'montant' => 'numeric',

            'produit_id' => 'numeric',
            'fournisseur_id' => 'numeric'
		];
	}

}
