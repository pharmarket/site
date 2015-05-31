<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente_exemplaire extends Model {

    protected $table = 'vente_exemplaire';
    protected $fillable = ['vente_id', 'exemplaire_id', 'quantite', 'montant'];


    public function vente(){
        return $this->belongsTo('\App\Vente', 'vente_id');
    }

    public function produit_exemplaire(){
        return $this->belongsTo('\App\Produit_exemplaire', 'exemplaire_id');
    }


}
