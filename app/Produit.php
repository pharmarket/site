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
	protected $fillable = ['categorie_id', 'marque_id', 'reference', 'nom', 'description'];

	public function pays(){
		return $this->belongsToMany('Pays');
	}

	/**
	 * List the LAST Product  to the home page.
	 *
	 * @return Array of Product
	 */

	public static function lastProducts()	{

		$idlang = Lang::where('code' , 'like' , App::getLocale())->first() ;
		$last = array();


		foreach (Produit::orderBy('created_at','DESC')->take(10)->get() as $key => $row) {

			if (Media::where('produit_id' , '=' , $row->attributes['id'])) {
				$nom = DB::table('produit_info')
													->where('produit_id', '=', $row->attributes['id'])
													->where('langue_id', '=', $idlang->attributes['id'])
							            ->select('nom', 'description')
							            ->first();
				$last[$key] = array();
				$last[$key]['id'] = $row->attributes['id'];
				$last[$key]['nom'] = (isset($nom->nom)?$nom->nom:"undefined");
				$last[$key]['description'] = (isset($nom->description)?$nom->description:"undefined");
				$media = Media::where('produit_id' , '=' , $row->attributes['id'])->first();
				$last[$key]['media'] = $media->attributes['chemin'].$media->attributes['nom'] ;
			}

		}

		return $last;
	}

	/**
	* List the LAST Product  to the home page.
	*
	* @return Array of Product
	*/
	public static function bestProducts()	{

	/*	SELECT id, count( `exemplaire_id` )
		FROM `commande_exemplaire`
		WHERE 1
		GROUP BY id
		LIMIT 0 , 30
		*/
		$idlang = Lang::where('code' , 'like' , App::getLocale())->first() ;
		$bestProducts = array();

		$best = DB::table('commande_exemplaire')
		                     ->select(DB::raw('id,count( `exemplaire_id` ) as count'))
		                     ->groupBy('id')
												 ->orderBy('count','DESC')
		                     ->get();
		$listbest = array( );

		foreach ($best as $key => $row) {
			$listbest[$key]= $row->id;
		}

		foreach (Produit::orderBy('created_at','DESC') ->whereIn('id',$listbest)->take(10)->get() as $key => $row) {

			if (Media::where('produit_id' , '=' , $row->attributes['id'])) {
				$nom = DB::table('produit_info')
													->where('produit_id', '=', $row->attributes['id'])
													->where('langue_id', '=', $idlang->attributes['id'])
							            ->select('nom', 'description')
							            ->first();
				$labestProductsst[$key] = array();
				$bestProducts[$key]['id'] = $row->attributes['id'];
				$bestProducts[$key]['nom'] = (isset($nom->nom)?$nom->nom:"undefined");
				$bestProducts[$key]['description'] = (isset($nom->description)?$nom->description:"undefined");
				$media = Media::where('produit_id' , '=' , $row->attributes['id'])->first();
				$bestProducts[$key]['media'] = $media->attributes['chemin'].$media->attributes['nom'] ;
			}

		}

		return $bestProducts;
	}
}
