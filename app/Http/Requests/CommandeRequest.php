<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommandeRequest extends Request {

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
        'livraison_id' => 'required|numeric',
        'paiement_id' => 'required|numeric',
        'user_id' => 'required|numeric',
        'devise_id' => 'required|numeric',
        'reference' => 'required|max:45|unique:commande',
        'commande_at' => 'required|date',
        'livraison_at' => 'required|date',
        'statut' => 'required|max:45',
        'livreur_id' => 'required|numeric'
    ];
	}

}
