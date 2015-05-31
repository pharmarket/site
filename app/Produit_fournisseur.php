<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_fournisseur extends Model {

	protected $table = 'produit_fournisseur';
	protected $fillable = ['produit_id', 'fournisseur_id'];


    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }

    public function fournisseur(){
        return $this->belongsTo('\App\Fournisseur', 'fournisseur_id');
    }

}