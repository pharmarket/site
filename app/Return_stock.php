<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_stock extends Model {

	protected $table = 'return_stock';

	public function user(){
		return $this->belongsTo('\App\User', '$user_id')
	}
}