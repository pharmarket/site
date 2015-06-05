<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Pays as Pays;
use App\Media as Media;
use App\Langue as Lang;
use \DB as DB;
use \App as App;
use App\Produit_info as Produit_info;
use App\Commande_exemplaire as Commande_exemplaire;
class Produit extends Model {
    protected $table = 'produit';
    protected $fillable = ['categorie_id', 'sous_categorie_id', 'marque_id', 'reference', 'nom', 'description','montant'];
    public function pays(){
        return $this->belongsToMany('\App\Pays');
    }
    public function getCreatedAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }
    public function getUpdatedAtAttribute($value){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($value)));
    }
    public function categorie(){
        return $this->belongsTo('\App\Produit_categorie','categorie_id');
    }
    public function sous_categorie(){
        return $this->belongsTo('\App\Sous_categorie','sous_categorie_id');
    }
    public function marque(){
        return $this->belongsTo('\App\Produit_marque', 'marque_id');
    }
    public function info(){
        return $this->hasMany('\App\Produit_info','produit_id');
    }
    public function media(){
        return $this->hasMany('\App\Media', 'produit_id');
    }
    public function posologie(){
        return $this->hasMany('\App\Posologie', 'produit_id');
    }
    public function posologieSex(){
        return $this->hasMany('\App\Posologie_sexe', 'produit_id');
    }
    public function fournisseurs(){
        return $this->belongsToMany('\App\Fournisseur', 'produit_fournisseur');
    }
    public function langues(){
        return $this->belongsToMany('\App\Langue', 'produit_info')->withPivot(['nom','description']);
    }
    /**
     * List the LAST Product  to the home page.
     *
     * @return Array of Product
     */
    public static function lastProducts()	{
        $idlang = Lang::where('code' , 'like' , App::getLocale())->first() ;
        $produit = DB::table('produit_info')	->join('produit', 'produit.id', '=', 'produit_info.produit_id')
            ->join('media', 'produit.id', '=', 'media.produit_id')
            ->where('produit_info.langue_id', '=', $idlang->id)
            ->where('media.langue_id', '=', $idlang->id)
            ->select('produit_info.nom', 'produit_info.description', 'produit.id', 'chemin')
            ->orderBy('produit.created_at','DESC')
            ->groupBy('produit.id')
            ->where('default', 1)
            ->take(10)
            ->get();
        return $produit;
    }
    /**
     * List the LAST Product  to the home page.
     *
     * @return Array of Product
     */
    public static function bestProducts()	{
        $idlang = Lang::where('code' , 'like' , App::getLocale())->first() ;
        $produit = DB::table('produit_info')	->join('produit', 'produit.id', '=', 'produit_info.produit_id')
            ->join('media', 'produit.id', '=', 'media.produit_id')
            ->join('produit_exemplaire', 'produit.id', '=', 'produit_exemplaire.produit_id')
            ->join('commande_exemplaire', 'commande_exemplaire.exemplaire_id', '=', 'produit_exemplaire.id')
            ->where('produit_info.langue_id', '=', $idlang->id)
            ->where('media.langue_id', '=', $idlang->id)
            ->select('produit_info.nom', 'produit_info.description', 'produit.id', 'chemin', DB::raw('count( `exemplaire_id` ) as count'))
            ->orderBy('count','DESC')
            ->groupBy('produit.id')
            ->where('default', 1)
            ->take(10)
            ->get();
        return $produit;
    }
}