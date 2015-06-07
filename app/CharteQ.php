<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CharteQ extends Model {

    protected $table = 'charteQ';
    protected $fillable = ['langue_id', 'title', 'description'];

    public function langue(){
        return $this->belongsTo('\App\Langue','langue_id');
    }

}
