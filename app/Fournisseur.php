<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model {

    protected $table = 'fournisseur';
    protected $fillable = ['siret', 'nom', 'adresse','cp', 'ville', 'phone', 'contact', 'commentaire'];


    public function ventee(){
        return $this->hasMany('\App\Vente', 'fournisseur_id');
    }

    public function produitFournisseur(){
        return $this->hasMany('\App\Produit_fournisseur', 'fournisseur_id');
    }

    public function produit(){
        return $this->belongsToMany('\App\Produit', 'produit_fournisseur');
    }

}