<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Produit_exemplaire extends Model {
    protected $table = 'produit_exemplaire';
    protected $fillable = ['produit_id', 'reference', 'peremption_at'];
    public function getPeremptionAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }
    public function getCreatedAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }
    public function getUpdatedAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }
    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }
}