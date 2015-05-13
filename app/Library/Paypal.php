<?php namespace App\Library;

use Illuminate\Database\Eloquent\Model;

class Paypal{
	public static function construit_url_paypal(){
		$api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?'; // Site de l'API PayPal. On ajoute déjà le ? afin de concaténer directement les paramètres.
		$version = 123.0; // Version de l'API
		$user = 'pharmarket.f2i_api1.gmail.com'; // Utilisateur API
		$pass = 'ZH6ZXADH2DR85S9N'; // Mot de passe API
		$signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgRCFmT2oUU7YymmobGIQPiAaz-G'; // Signature de l'API

		$api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres

		return 	$api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
	}

	public static function recup_param_paypal($resultat_paypal){
		$liste_parametres = explode("&",$resultat_paypal); // Crée un tableau de paramètres
		foreach($liste_parametres as $param_paypal) // Pour chaque paramètre
		{
			list($nom, $valeur) = explode("=", $param_paypal); // Sépare le nom et la valeur
			$liste_param_paypal[$nom]=urldecode($valeur); // Crée l'array final
		}
		return $liste_param_paypal; // Retourne l'array
	}

	public static function getTotalCart(){
		$user =  \Auth::user();

		//Recuperation du prix du livreur
		$livreurPrix = \DB::table('livreur')	->join('livreur_pays', 'livreur_pays.livreur_id', '=', 'livreur.id')
							->where('livreur_pays.pays_id', '=', $user->ville->pays->id)
							->where('livreur.id', '=',  \Session::get('livreur'))
							->get()[0]->prix;
		//calcul avec le taux
		$livreurPrix *= \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0]->taux;

		//Calcul total
		return \Cart::total() + $livreurPrix;
	}

	public static function launchPayment(){
		$requete = self::construit_url_paypal(); // Construit les options de base

		$mapping = [
			'EN' => 'GB',
			'FR' => 'FR',
			'ES' => 'ES',
			'DE' => 'DE',
		];

		$currency_code = \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0]->paypal_code;

		// La fonction urlencode permet d'encoder au format URL les espaces, slash, deux points, etc.)
		$requete = $requete."&METHOD=SetExpressCheckout".
					"&CANCELURL=".urlencode(route('purchase.cancel')).
					"&RETURNURL=".urlencode(route('purchase.return')).
					"&AMT=".self::getTotalCart().
					// "&CURRENCYCODE=".$currency_code.
					"&CURRENCYCODE=".$currency_code.
					"&DESC=".urlencode("Commande des vos médicaments").
					"&LOCALECODE=".$mapping[strtoupper(\Lang::getLocale())].
					"&HDRIMG=".urlencode(asset('front/images/Logo-pharmarket.jpg') );
		$resultat_paypal = file_get_contents($requete);// S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.
		if (empty($resultat_paypal)){echo "<p>Erreur</p><p>".curl_error($ch)."</p>";}
		else {
			$liste_param_paypal = self::recup_param_paypal($resultat_paypal);

			// Si la requête a été traitée avec succès
			if ($liste_param_paypal['ACK'] == 'Success'){
				// Redirige le visiteur sur le site de PayPal
				header("Location: https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=".$liste_param_paypal['TOKEN']);
                			exit();
			}
			else {echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";}
		}
	}

	public static function finishPayment(){
		$requete = self::construit_url_paypal(); // Construit les options de base

		$currency_code = \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0]->paypal_code;

		// On ajoute le reste des options
		// La fonction urlencode permet d'encoder au format URL les espaces, slash, deux points, etc.)
		$requete = $requete."&METHOD=DoExpressCheckoutPayment".
					"&TOKEN=".htmlentities(\Input::get('token'), ENT_QUOTES). // Ajoute le jeton qui nous a été renvoyé
					"&AMT=".self::getTotalCart().
					"&CURRENCYCODE=".$currency_code.
					"&PayerID=".htmlentities(\Input::get('PayerID'), ENT_QUOTES). // Ajoute l'identifiant du paiement qui nous a également été renvoyé
					"&PAYMENTACTION=sale";

		$resultat_paypal = file_get_contents($requete);// S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.

		if (empty($resultat_paypal)) {echo "<p>Erreur</p><p>".curl_error($ch)."</p>";}
		else{
			$liste_param_paypal = self::recup_param_paypal($resultat_paypal); // Lance notre fonction qui dispatche le résultat obtenu en un array

			// Si la requête a été traitée avec succès
			return $liste_param_paypal['ACK'] == 'Success';
		}
	}
}
