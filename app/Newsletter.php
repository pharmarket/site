<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

	protected $table = 'newsletter';
	protected $fillable = ['langue_id', 'content'];

	public function langue(){
		return $this->belongsTo('\App\langue', 'langue_id');
	}

}