<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model {

	protected $table = 'produit';
	protected $fillable = ['categorie_id', 'marque_id', 'reference', 'nom', 'description'];

}
