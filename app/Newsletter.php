<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

	protected $table = 'newsletter';
	protected $fillable = ['title', 'langue_id', 'content', 'send_at'];

	public function langue(){
		return $this->belongsTo('\App\Langue', 'langue_id');
	}

	public function getSendAtAttribute($value){
		return !empty($value)?date('d/m/Y', date_timestamp_get(date_create($value))) : null;
	}

}
