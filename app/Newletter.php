<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Newletter extends Model {

	protected $table = 'newletters';
	protected $fillable = ['mail', 'choix', ];

}