<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;

	protected $table = 'user';
	protected $fillable = ['role_id', 'ville_id', 'nom', 'prenom', 'mail', 'password', 'pseudo', 'phone', 'mobile'];



	public function ville(){
       	 	return $this->belongsTo('App\Ville');
    	}
	public function role(){
       	 	return $this->belongsTo('App\Role');
    	}

	public function getFullnameAttribute(){
       	 	return strtoupper($this->nom) . ' ' . $this->prenom;
    	}


}
