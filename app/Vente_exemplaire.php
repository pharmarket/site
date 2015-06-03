<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente_exemplaire extends Model {

    protected $table = 'achat_exemplaire';
    protected $fillable = ['achat_id', 'exemplaire_id', 'quantite', 'montant'];


    public function vente(){
        return $this->belongsTo('\App\Vente', 'achat_id');
    }

    public function produit_exemplaire(){
        return $this->belongsTo('\App\Produit_exemplaire', 'exemplaire_id');
    }


}
