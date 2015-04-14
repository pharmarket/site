<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_forum extends Model {

	protected $table = 'categorie_forum';
	protected $fillable = ['label', 'description'];

}
