<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model {

    protected $table = 'vente';
    protected $fillable = ['devise_id', 'entrepot_id', 'fournisseur_id', 'reference', 'commande_at', 'livraison_at', 'statut', 'montant'];


    public function devise(){
        return $this->belongsTo('\App\Devise', 'devise_id');
    }

    public function entrepot(){
        return $this->belongsTo('\App\Ville', 'entrepot_id');
    }


    public function ventee(){
        return $this->hasMany('\App\Vente_exemplaire', 'vente_id');
    }

    public function fournisseur(){
        return $this->belongsTo('\App\Fournisseur', 'fournisseur_id');
    }

}
