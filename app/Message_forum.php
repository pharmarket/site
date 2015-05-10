<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_forum extends Model {

	protected $table = 'message_forum';
	protected $fillable = ['sujet_id', 'user_id','message'];

	public function sujet(){
		return $this->belongsTo('\App\Sujet_forum','sujet_id');
	}

	public function user(){
		return $this->belongsTo('\App\User','user_id');
	}

}