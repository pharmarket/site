<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCommandeRequest extends Request {

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
            'commande_at' => 'required|date',
            'livraison_at' => 'required|date',
            'statut' => 'required|max:45',
            'livreur_id' => 'required|numeric',

            // Exemplaire Commande
            'exemplaire_id' => 'numeric',
            'commande_id' => 'numeric',
            'devise_id'  => 'numeric',
            'montant' => 'numeric'
        ];
    }

}
