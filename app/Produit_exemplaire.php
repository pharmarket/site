<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Produit_exemplaire extends Model {
    protected $table = 'produit_exemplaire';
    protected $fillable = ['produit_id', 'reference', 'peremption_at'];

    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }

}