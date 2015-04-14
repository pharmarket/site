<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

	protected $table = 'ville';
	protected $fillable = ['pays_id', 'nom', 'cp', 'adresse'];

	public function pays(){
		return $this->belongsTo('\App\Pays','pays_id');
	} 

}
