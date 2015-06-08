<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model {

	protected $table = 'pays';
	protected $fillable = ['langue_id', 'devise_id', 'nom'];

	public function devise(){
		return $this->belongsTo('\App\Devise','devise_id');
	}

	public function livreurs(){
       	 	return $this->belongsToMany('App\Livreur', 'livreur_pays');
    	}

    public function langue(){
		return $this->belongsTo('\App\Langue','langue_id');
	}
}
