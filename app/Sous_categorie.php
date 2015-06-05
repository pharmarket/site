<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sous_categorie extends Model {

    protected $table = 'sous_categorie';
    protected $fillable = ['produit_categorie_id', 'langue_id', 'nom', 'description'];

    public function langue(){
        return $this->belongsTo('\App\Langue', 'langue_id');
    }

    public function categorie(){
    	return $this->belongsTo('\App\Produit_categorie', 'produit_categorie_id');
    }

}