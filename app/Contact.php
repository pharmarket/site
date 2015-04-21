<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contact';

	public function langue(){
       	 	return $this->belongsTo('App\Langue');
    	}

	public function getDoneAttribute($value){
	        return $value ? '✔': '';
	}

	public function getCreatedAtAttribute($value){
		return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
	}

	//Cette conction empeche le model d'essayer de remplir updated_at (fonction timestamps), c'est bien par ce qu'il nexiste pas
	public function setUpdatedAt($value){
	   //Do-nothing
	}

	public function getUpdatedAtColumn(){
	    //Do-nothing
	}
}
