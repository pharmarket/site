<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_marque extends Model {

	protected $table = 'produit_marque';
	protected $fillable = ['nom', 'description'];

}