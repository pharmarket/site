<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoPharmarket extends Model {

    protected $table = 'whoPharmarket';
    protected $fillable = ['langue_id', 'title', 'description'];

    public function langue(){
        return $this->belongsTo('\App\Langue','langue_id');
    }

}
