<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeRequest;
use App\Http\Requests\EditCommandeRequest;
use App\Http\Requests\ExemplaireRequest;
use App\Http\Requests\ImportCsvRequest;
use Illuminate\Http\Request;

class CommandeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $commande = \App\Commande::with('user', 'devise', 'livraison', 'paiement', 'livreur', 'commandeExemplaire', 'statut')->get();

        //$commandeExemplaire = \App\Commande_exemplaire::with('exemplaire', 'devise', 'commande')->get();

        return View('admin.commande.commande', compact('commande'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($commande)
	{
        // Récupération des produits
        $exemplaire = \DB::table('commande_exemplaire')
            ->select(\DB::raw('count(exemplaire_id) as total'))
            ->where('commande_id', '=', $commande->id)
            ->groupBy('commande_id')
            ->get();



        $exemplaireProduct = \DB::table('commande_exemplaire')
            ->select()
            ->join('produit_exemplaire', 'commande_exemplaire.exemplaire_id', '=', 'produit_exemplaire.id')
            ->where('commande_id', '=', $commande->id)
            ->get();

        //dd($exemplaireProduct);
        //dd($exemplaire);

        return View('admin.commande.show', compact('commande', 'exemplaire', 'exemplaireProduct'));
	}


    public function getExportCSV(){
        return View('admin.commande.getExportCSV');
    }


    public function exportCSV(){
        $commande = \App\Commande::with('user', 'devise', 'livraison', 'paiement', 'livreur', 'commandeExemplaire')->get();
        $table = array();

        foreach($commande as $row){
            $commandeE = \App\Commande_exemplaire::with('exemplaire', 'devise', 'commande')->where('commande_id', '=', $row->id)->get();
            foreach($commandeE as $e) {
                $table[] = array(
                    $row->reference,
                    $row->commande_at,
                    $row->livraison_at,
                    $row->statut->label,
                    $row->livraison->adresse,
                    $row->livraison->cp,
                    $row->livraison->ville,
                    $row->paiement->montant,
                    $row->user->nom,
                    $row->user->prenom,
                    $row->user->mail,
                    $row->user->pseudo,
                    $row->user->phone,
                    $row->user->mobile,
                    $row->devise->nom,
                    $row->devise->symbole,
                    $row->devise->taux,
                    $row->livreur->duration,
                    $row->livreur->nom,
                    $e->montant,
                    $e->exemplaire->reference,
                    $e->devise->nom
                );
            }
        }

        \Excel::create('Commande', function($excel) use($table) {
            $excel->sheet('Commande', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, array(
                    'ref_commande',
                    'commande_at',
                    'livraison_at',
                    'statut_commande',
                    'adresse_livraison',
                    'cp_livraison',
                    'ville_livraison',
                    'montant_paiement',
                    'nom_user',
                    'prenom_user',
                    'mail_user',
                    'pseudo_user',
                    'phone_user',
                    'mobile_user',
                    'nom_devise',
                    'symbol_devise',
                    'taux_devise',
                    'duration_livreur',
                    'nom_livreur',
                    'montant_commandeExemplaire',
                    'reference_produit',
                    'devise_exemplaire'
                ));
            });
        })->export('csv');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($commande)
	{
        //Suppression de des données dans la table commande
        $commande->delete();
        return redirect()->back()->withFlashMessage("Suppression de la commande effectuée avec succès");
	}

}
