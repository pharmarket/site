<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    protected $table = 'faq';
    protected $fillable = ['langue_id', 'question', 'answer', 'order'];

    public function langue(){
        return $this->belongsTo('\App\Langue','langue_id');
    }

}
