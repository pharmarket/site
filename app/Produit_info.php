<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_info extends Model {

	public $timestamps 	  = false;
	protected $table 	  = 'produit_info';
	protected $fillable   = ['produit_id', 'langue_id', 'nom', 'description', 'notice'];


    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }

    public function langue(){
        return $this->belongsTo('\App\Langue', 'langue_id');
    }

}