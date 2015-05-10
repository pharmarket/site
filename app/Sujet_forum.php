<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sujet_forum extends Model {

	protected $table = 'sujets_forum';
	protected $fillable = ['categorie_id', 'sujet'];

	public function catagorieForum(){
		return $this->belongsTo('\App\Categorie_forum','categorie_id');
	}

}