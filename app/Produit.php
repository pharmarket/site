<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pays as Pays;
use App\Media as Media;

class Produit extends Model {

	protected $table = 'produit';
	protected $fillable = ['categorie_id', 'marque_id', 'reference', 'nom', 'description'];

	public function pays(){
		return $this->belongsToMany('Pays');
	}

/*public function lastProducts()	{

	$produit = DB::table(
	DB::raw('('.
  DB::table('produit')->orderBy('created_at', 'desc')
	->take(10)->toSql().') produit'))->orderBy('created_at', 'desc')->get();

	return $produit;
}*/

}
