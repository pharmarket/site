<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_exemplaire extends Model {

	protected $table = 'commande_exemplaire';

	public function Produit_exemplaire(){

			return $this->belongsTo('\App\Produit_exemplaire','exemplaire_id');
			
	}

}
