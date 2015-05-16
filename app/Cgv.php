<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cgv extends Model {

    protected $table = 'cgv';
    protected $fillable = ['langue_id', 'title', 'cgv'];

    public function langue(){
        return $this->belongsTo('\App\Langue','langue_id');
    }

}
