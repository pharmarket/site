<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cgu extends Model {

	protected $table = 'cgu';
	protected $fillable = ['langue_id', 'title', 'cgu'];

	public function langue(){
		return $this->belongsTo('\App\Langue','langue_id');
	} 

}
