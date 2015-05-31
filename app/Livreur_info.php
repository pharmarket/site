<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Livreur_info extends Model {

    protected $table = 'livreur_info';
    protected $fillable = ['langue_id', 'livreur_id', 'description'];

    public function langue(){
        return $this->belongsTo('\App\Langue', 'langue_id');
    }


    public function livreur(){
        return $this->belongsTo('\App\Livreur', 'livreur_id');
    }

}
