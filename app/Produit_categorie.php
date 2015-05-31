<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Produit_categorie extends Model {
    protected $table = 'produit_categorie';
    protected $fillable = ['langue_id', 'nom', 'description'];
    public function sous_categorie(){
        return $this->hasMany('\App\Sous_categorie', 'produit_categorie_id');
    }
    public function langue(){
        return $this->belongsTo('\App\Langue', 'langue_id');
    }
}