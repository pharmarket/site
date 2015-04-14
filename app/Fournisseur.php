<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model {

	protected $table = 'fournisseur';
	protected $fillable = ['siret', 'nom', 'adresse','cp', 'ville', 'phone', 'contact', 'commentaire'];

}
