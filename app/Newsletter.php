<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

	protected $table = 'newsletter';
	protected $fillable = ['langue_id', 'content', 'send_at'];

	public function langue(){
		return $this->belongsTo('\App\Langue', 'langue_id');
	}

}
