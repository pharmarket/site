<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_categorie extends Model {

    protected $table = 'produit_categorie';
    protected $fillable = ['langue_id', 'nom', 'description'];

    public static function menu(){
 		$categorie = \App\Produit_categorie::with('sous_categorie')->get();
 		return $categorie;
 	}

    public function sous_categorie(){
        return $this->hasMany('\App\Sous_categorie', 'produit_categorie_id');
    }

    public function langue(){
        return $this->belongsTo('\App\Langue', 'langue_id');
    }

}