<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posologie extends Model {

	protected $table = 'posologie';
	protected $fillable = ['produit_id', 'type_id', 'min', 'max','coeff'];

	public function produit(){
		return $this->belongsTo('\App\produit','produit_id');
	}

	public function posologie_type(){
		return $this->belongsTo('\App\Posologie_type', 'type_id');
	}
}
