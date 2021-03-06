<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_exemplaire extends Model {

    protected $table = 'commande_exemplaire';

    protected $fillable = ['exemplaire_id', 'commande_id', 'montant', 'devise_id'];


    public function exemplaire(){
        return $this->belongsTo('\App\Produit_exemplaire', 'exemplaire_id');
    }

    public function devise(){
        return $this->belongsTo('\App\Devise', 'devise_id');

    }

    public function commande(){
        return $this->belongsTo('\App\Commande', 'commande_id');
    }

}
