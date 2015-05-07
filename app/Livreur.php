<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Livreur extends Model {

	protected $table = 'livreur';
	public $timestamps = false;

	public function pays(){
       	 	return $this->belongsToMany('App\Pays', 'livreur_pays')->withPivot('prix');
    	}

	public function langues(){
       	 	return $this->belongsToMany('App\Langue', 'livreur_info');
    	}

    	public function frais($user){
		//Recuperation du prix du livreur
		$livreurPrix = \DB::table('livreur')	->join('livreur_pays', 'livreur_pays.livreur_id', '=', 'livreur.id')
							->where('livreur_pays.pays_id', '=', $user->ville->pays->id)
							->where('livreur.id', '=',  \Session::get('livreur'))
							->get()[0]->prix;
		//calcul avec le taux
		$livreurPrix *= \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0]->taux;

		return $livreurPrix;
    	}
}
