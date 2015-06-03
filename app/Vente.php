<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model {

    	protected $table = 'achat';
    	protected $fillable = ['devise_id', 'entrepot_id', 'fournisseur_id', 'reference', 'commande_at', 'livraison_at', 'statut_id', 'montant'];

	public function devise(){
		return $this->belongsTo('\App\Devise', 'devise_id');
	}

	public function entrepot(){
		return $this->belongsTo('\App\Ville', 'entrepot_id');
	}

	public function ventee(){
		return $this->hasMany('\App\Vente_exemplaire', 'achat_id');
	}

    	public function fournisseur(){
		return $this->belongsTo('\App\Fournisseur', 'fournisseur_id');
    	}

    	public function statut(){
		return $this->belongsTo('\App\Vente_statut', 'statut_id');
    	}

}
