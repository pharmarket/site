<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Admin extends Controller {
	public function index()
	{
		$new_sales = \App\Commande::whereRaw('MONTH(created_at) = MONTH(DATE(NOW()))')->count();
		$new_users = \App\User::whereRaw('MONTH(created_at) = MONTH(DATE(NOW()))')->count();

		$sales = \DB::table('commande')->select(\DB::raw("SUM(montant) as total, DATE_FORMAT(commande.created_at,'%Y-%m') as y"))
						->join('commande_exemplaire', 'commande_exemplaire.commande_id', '=', 'commande.id')
						->groupBy(\DB::raw("DATE_FORMAT(commande.created_at,'%Y-%m')"))
						->get();
		$json_sales = json_encode($sales);

		$purchase = \DB::table('achat')->select(\DB::raw("SUM(achat_exemplaire.montant) as total, DATE_FORMAT(achat.created_at,'%Y-%m') as y"))
						->join('achat_exemplaire', 'achat_exemplaire.achat_id', '=', 'achat.id')
						->groupBy(\DB::raw("DATE_FORMAT(achat.created_at,'%Y-%m')"))
						->get();
		$json_purchase = json_encode($purchase);

		return view('admin.index', compact('new_sales', 'new_users', 'json_sales','json_purchase'));
	}

}
