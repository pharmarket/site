<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_fournisseur extends Model {

	protected $table = 'produit_fournisseur';
	protected $fillable = ['produit_id', 'fournisseur_id'];

}