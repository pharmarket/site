<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\ProduitRequest;
use App\Http\Requests\ImportCsvRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProduitController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$produit = \App\Produit::with('categorie', 'marque', 'media', 'info')->get();

		return View('admin.produit.produit', compact('produit'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Récuperer Marques & Catégories
		$marques 	 	  = \App\Produit_marque::lists('nom', 'id');
		$categories  	  = \App\Produit_categorie::lists('nom', 'id');
		$sousCategories   = \App\Sous_categorie::lists('nom', 'id');
		$fournisseurs 	  = \App\Fournisseur::lists('nom', 'id');
		$langues		  = \App\Langue::get();

		return View('admin.produit.create',compact('marques', 'categories', 'sousCategories', 'fournisseurs', 'langues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProduitRequest $request)
	{
		$notice = \Input::file('notice');

		// Enregistrement dans la table produit
		$produit = new \App\Produit;
		$produit->reference 		= $request->reference;
		$produit->marque_id 		= $request->marque;
		$produit->sous_categorie_id = $request->sousCategorie;
		$produit->categorie_id 		= $request->categorie;
		$produit->montant			= $request->montant;
		$produit->save();

		if(!empty($notice)){
				$destinationPath = public_path() . '/pdf/notice/';
				$fileName = 'notice_' . $produit->id .'.'.$notice->getClientOriginalExtension();
				$notice->move($destinationPath, $fileName);
				$produit->notice ='/pdf/notice/'.$fileName;
		}
		$produit->save();

		// Enregistrement dans la table produit_fournisseur
		$produit->fournisseurs()->attach($request->fournisseur);

		// Enregistrement dans la table produit_info nom et description
		foreach ($request->all() as $key => $description) {
			if(strpos($key, 'description') === 0){
				list(,$id) = explode("_", $key);
				$produit->langues()->attach($id, ['nom' => \Request::input('nom_'.$id),
												  'description' => $description,]);
			}
		}

      	// Enregistrement dans la table media d'une image par défault
		$media = new \App\Media;
		$media->produit_id 	= $produit->id;
		$media->type		=	'image';
		$media->langue_id 	= 1;
		$media->nom 		= 'nondisponible.jpeg';
		$media->chemin 		= 'img/produits/nondisponible.jpeg';
		$media->default 	= 1;
		$media->save();

		return redirect('/admin/produit')->withFlashMessage("Création du produit effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($produit)
	{
		// Recupere le nombre de produit
		$exemplaire = \DB::table('produit_exemplaire')
        			  ->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')
                	  ->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
                 	  ->where('produit_exemplaire.produit_id', '=', $produit->id)
                 	  ->whereNotIn('produit_exemplaire.id',function($q){
						    $q->select('exemplaire_id')->from('commande_exemplaire');
						})
                 	  ->get();

		// Recupere la notice
		$produit_info = \App\Produit_info::where('produit_id', $produit->id)->get();

		return View('admin.produit.show', compact('produit', 'exemplaire', 'produit_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($produit)
	{
		// Récuperer Marques & Catégories
		$marques 		= \App\Produit_marque::lists('nom', 'id');
		$categories 	= \App\Produit_categorie::lists('nom', 'id');
		$sousCategories = \App\Sous_categorie::lists('nom', 'id');
		$fournisseurs 	= \App\Fournisseur::lists('nom', 'id');
		$langues		= \App\Langue::get();
		$langues_list		= \App\Langue::lists('label', "id");
		$langueVideos	= \App\Langue::lists('label', 'id');

		return View('admin.produit.edit', compact('produit', 'marques', 'categories', 'sousCategories', 'fournisseurs', 'langues', 'langues_list', 'langueVideos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($produit, ProduitRequest $request)
	{
		$notice = \Input::file('notice');

		// Mise à jour de la table Produit
		$produit->reference 		= $request->reference;
		$produit->marque_id 		= $request->marque;
		$produit->categorie_id 		= $request->categorie;
		$produit->sous_categorie_id = $request->sousCategorie;
		$produit->montant			= $request->montant;

		if(!empty($notice)){
				$destinationPath = public_path() . '/pdf/notice/';
				$fileName = 'notice_' . $produit->id .'.'.$notice->getClientOriginalExtension();
				$notice->move($destinationPath, $fileName);
				$produit->notice ='/pdf/notice/'.$fileName;
		}
		$produit->save();

		// Mise à jour de la table produit_fournisseur
		$produit->fournisseurs()->sync($request->fournisseur);

		// Enregistrement dans la table produit_info nom et description
		foreach ($request->all() as $key => $description) {
			if(strpos($key, 'description') === 0){
				list(,$id) = explode("_", $key);
				$tab[$id] = ['nom' => \Request::input('nom_'.$id), 'description' => $description];
			}
		}

		$produit->langues()->sync($tab);

		// Recupère le nombre d'images du produit
		$nbImages = \App\Media::where('produit_id', '=', $produit->id)->count();

		// Suppression des images dans la table Media si case cochée
		foreach ($request->all() as $key => $image) {
			if(strpos($key,'supprimer') === 0){
				$media = new \App\Media;
				$media = \App\Media::find($image);
				if(!($media->nom == 'nondisponible.jpeg') && ($nbImages>1)){
					$media->delete();
				}
			}
		}

		// Mise à jour du statut par default dans la table Media
		// Mise à la valeur 0 du champs default de l'image par default
		$media = \App\Media::with('produit')->where('produit_id',$produit->id)->lists('id');

		// On remet tous les champs a zero pour etre sure
		foreach ($media as $id) {
			$media = \App\Media::find($id);
			$media->default = '0';
			$langue = $request->get('langues_'.$media->id);
			if(!empty($langue)){
				$media->langue_id = $langue;
			}
			$media->save();
		}

		// Mise à la valeur 1 du champs default de l'image selectionnée par default
		$media = new \App\Media();
		$media = \App\Media::find($request->parDefault);
		$media->default ='1';
		$media->save();

		// Enregistrement dans la table Media des informations d'une video
		if($request->video_chemin != '')
		{
			$media  = new \App\Media();
			$media->produit_id 	= $produit->id;
			$media->langue_id	= $request->video_langue;
			$media->type 		= 'video';
			$media->chemin 		= $request->video_chemin;
			$media->description = $request->video_description;
			$media->save();
		}

		// Suppression des vidéos dans la table Media si case cochée
		foreach($request->all() as $key => $video){
			if(strpos($key, 'videoSupprimer') === 0){
				$media = new \App\Media;
				$media = \App\Media::find($video);
				$media->delete();
			}
		}

		return redirect('/admin/produit')->withFlashMessage("Mise à jour du produit effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($produit)
	{
		//Suppression de des données dans la table produit
				$produit->delete();
				
        return redirect()->back()->withFlashMessage("Suppression du produit effectuée avec succès");
	}


	/**
	 * Upload Pictures.
	 */
	public function upload(){

		// Enregistrement du fichier sur le serveur
		$output_dir = "img/produits/";

		//dd(\Input::file('myfile'));

		if(isset($_FILES["myfile"]))
		{
			$ret = array();

			$error =$_FILES["myfile"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData()
			if(!is_array($_FILES["myfile"]["name"])) //single file
			{
		 	 	$fileName = strtotime('now') . '_'. $_FILES["myfile"]["name"];
		 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
		    	$ret[]= $fileName;

		    	// Enregistrement des données dans la table
				$media 	= new \App\Media;
				//$media->produit_id  = $_POST['idproduit'];
				$media->produit_id  = \Input::get('idproduit');
				$media->langue_id	= 1;
				$media->type 		= "image";
				$media->chemin 		= "img/produits/". $fileName;
				$media->nom 		= $fileName;
				$media->save();
			}
			else  //Multiple files, file[]
			{
			  $fileCount = count($_FILES["myfile"]["name"]);
			  for($i=0; $i < $fileCount; $i++)
			  {
			  	$fileName = $_FILES["myfile"]["name"][$i];
				move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
			  	$ret[]= $fileName;

			  	// Enregistrement des données dans la table
				$media 				= new \App\Media;
				$media->produit_id  = \Input::get('idproduit');;
				$media->type 		= "Image";
				$media->chemin 		= "img/produits/";
				$media->nom 		= $fileName;
				$media->save();
			  }

			}
		    echo json_encode($ret);
		}
	}

	/**
	 * Delete Pictures.
	 */
	public function delete(){

		$output_dir = "img/produits/";
		if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
		{
			$fileName =$_POST['name'];
			$filePath = $output_dir. $fileName;
			if (file_exists($filePath))
			{
		        unlink($filePath);
		    }
			echo "Deleted File ".$fileName."<br>";

			// Suppression de l'enregistrement des données du fichier en base de données
			$media 	= new \App\Media;
			$media 	= \App\Media::where('nom', '=', $fileName);
			$media->delete();
		}
	}

	/**
	 * Import CSV.
	 */
	public function importCSV(){

        return View('admin.produit.importCSV');
    }

    public function importCsvProduits(ImportCsvRequest $request){

        if (\Input::hasFile('file')) {

            $file = \Input::file('file');
            \Excel::load($file, function($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $produit = new \App\Produit;
                    $produit->categorie_id 		= $result['categorie_id'];
                    $produit->sous_categorie_id = $result['sous_categorie_id'];
                    $produit->marque_id 		= $result['marque_id'];
                    $produit->reference 		= $result['reference'];
                    $produit->montant 			= $result['montant'];
                    $produit->save();
                }
            });

        return redirect('/admin/produit/importCSV')->withFlashMessage("Ajout des produits effectué avec succès");
    	}
    }

    public function importCsvExemplaires(ImportCsvRequest $request){

        if (\Input::hasFile('file')) {

            $file = \Input::file('file');
            \Excel::load($file, function($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $produit_exemplaire = new \App\Produit_exemplaire;
                    $produit_exemplaire->produit_id 	= $result['produit_id'];
                    $produit_exemplaire->reference  	= $result['reference'];
                    $produit_exemplaire->peremption_at 	= $result['peremption_at'];
                    $produit_exemplaire->save();
                }
            });
        }
        return redirect('/admin/produit/importCSV')->withFlashMessage("Ajout des exemplaires effectué avec succès");
    }

    public function exportCSV(){

    	return View('admin.produit.exportCSV');
    }

    public function exportCsvProduitsInfos(){

    	$produits = \DB::table('produit')
    				->orderBy('produit.reference', 'asc')
				  	->join('produit_marque', 'produit.marque_id', '=', 'produit_marque.id')
					->join('produit_categorie', 'produit.categorie_id', '=', 'produit_categorie.id')
					->join('sous_categorie', 'produit.sous_categorie_id', '=', 'sous_categorie.id')
					->join('produit_info', 'produit.id', '=', 'produit_info.produit_id')
					->select('produit.reference as referenceProduit', 'produit_info.nom as nomProduit', 'produit_info.description as descriptionProduit', 'montant as montantProduit', 'produit_marque.nom as marqueProduit', 'produit_categorie.nom as categorieProduit', 'sous_categorie.nom as sousCategorieProduit')
					->get();

        $table = array();

        foreach($produits as $row){
            //$produitInfos = \App\Produit_info::where('produit_id', '=', $row->id)->get();
            //foreach ($produitInfos as $prodInfos) {
	            $table[] = array
	            (
	            	$row->referenceProduit,
	            	$row->nomProduit,
	            	$row->descriptionProduit,
					// $prodInfos->nomProduit,
					// $prodInfos->descriptionProduit,
					// $prodInfos->noticeProduit,
					$row->montantProduit,
					$row->marqueProduit,
					$row->categorieProduit,
					$row->sousCategorieProduit
				);
        	//}
        }

        \Excel::create('Produits', function($excel) use($table) {
            $excel->sheet('Produits', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, 	array(
                					'ref_produit',
                					'nom_produit',
                					'description_produit',
                					'montant_produit',
                					'marque_produit',
                					'categorie_produit',
                					'sous_categorie_produit'
                    			));
            });
        })->export('csv');
    }

    public function exportCsvExemplairesInfos(){

    	$exemplaires = \DB::table('produit')
    				   ->join('produit_exemplaire', 'produit.id', '=', 'produit_exemplaire.produit_id')
    				   ->select('produit.reference as referenceProduit', 'produit_exemplaire.reference as referenceExemplaire', 'produit_exemplaire.peremption_at as peremptionExemplaire')
    				   ->get();

		$table = array();

        foreach($exemplaires as $row){
            $table[] = array
            (
            	$row->referenceProduit,
            	$row->referenceExemplaire,
            	$row->peremptionExemplaire
			);
        }

        \Excel::create('Exemplaires', function($excel) use($table) {
            $excel->sheet('Exemplaires', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, 	array(
                					'ref_produit',
                					'ref_exemplaire',
                					'peremption_exemplaire'
                    			));
            });
        })->export('csv');
    }
}
