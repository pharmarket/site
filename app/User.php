<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = 'user';
	protected $fillable = ['role_id', 'ville_id', 'nom', 'prenom', 'mail', 'password', 'pseudo', 'phone', 'mobile'];



	public function ville(){
       	 	return $this->belongsTo('App\Ville');
    	}

	public function getFullnameAttribute(){
       	 	return strtoupper($this->nom) . ' ' . $this->prenom;
    	}


}
