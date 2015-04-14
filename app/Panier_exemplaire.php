<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier_exemplaire extends Model {

	protected $table = 'panier_exemplaire';
	protected $fillable = ['panier_id', 'exemplaire_id','qte'];

	public function panier(){
		return $this->belongsTo('\App\Panier','panier_id');
	}

	public function produit_exemplaire(){
		return $this->belongsTo('\App\Produit_exemplaire','exemplaire_id');
	}

}