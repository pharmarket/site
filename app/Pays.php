<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model {

	protected $table = 'pays';
	protected $fillable = ['devise_id', 'nom'];

	public function devise(){
		return $this->belongsTo('\App\Devise','devise_id');
	} 

}