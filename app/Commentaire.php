<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Commentaire extends Model {
    protected $table = 'commentaire';
    protected $fillable = ['user_id', 'produit_id', 'nom', 'description', 'note', 'done'];

    public function getDoneAttribute($value){
        return $value ? '✔': '';
    }

    public function getCreatedAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }

    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }
    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }
}