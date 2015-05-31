<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Commentaire extends Model {
    protected $table = 'commentaire';
    protected $fillable = ['user_id', 'produit_id', 'nom', 'description', 'note'];
    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }
    public function produit(){
        return $this->belongsTo('\App\Produit', 'produit_id');
    }
}