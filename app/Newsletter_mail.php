<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter_mail extends Model {

	protected $table = 'newsletter_mail';
	protected $fillable = ['langue_id', 'mail'];

	public function getCreatedAtAttribute($value){
		return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
	}

	/*
	public function getChoixAttribute($value){
	    return $value ? '✔': '';
	}
	*/

	public function langue(){
		return $this->belongsTo('\App\Langue','langue_id');
	}

}
