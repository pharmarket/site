<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();

		$schedule->call(function(){

			//Recuperation des newsletter du jour
			$news = \App\Newsletter::whereRaw('DATE(send_at) = DATE(NOW())')->get();

			foreach ($news as $row) {
				//On cherche tous les mails pour le pays concerné
				$mail = \App\Newsletter_mail::where('langue_id', $row->langue_id)->get();

				foreach ($mail as $value) {
					// envoie du mail
					\Mail::send('mail.newsletter', ['content' => $row->content], function($message) use ($value){
					    $message->to($value->mail)->subject('Newsletter');
					   	$message->from('pharmarket.f2i@gmail.com', 'Pharmarket');
					});
				}
			}
		})->dailyAt('05:00');

		$schedule->call(function(){

			// Recupère l'ensemble des produits en alerte 
			$retour_stock = \App\Return_stock::whereNull('sended_at')->get();

			foreach ($retour_stock as $row) {
				
				// Verification de la disponibilité du produit
				$nbExemplairesProduit 	= \DB::table('produit_exemplaire')
					        			->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')
					                	->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
					                 	->where('produit_exemplaire.produit_id', $row->produit_id)
					                 	->whereNotIn('produit_exemplaire.id',function($q){
											$q->select('exemplaire_id')->from('commande_exemplaire');
										})
					                 	->get();

				//var_dump($nbExemplairesProduit);

				if(!empty($nbExemplairesProduit)){
					// Recpuère les informations du produit désiré
					$produit = \App\Produit::find($row->produit_id);

					// Envoi du mail
					\Mail::send('mail.alertDispo-'. strtolower($row->user->ville->pays->langue->code), compact('produit'), function($message) use ($row){
					    	$message->to($row->user->mail)->subject(\Lang::get('retour_stock.indisponible'));
					   		$message->from('pharmarket.f2i@gmail.com', 'Pharmarket');
					});

					// Mise à jour de la date Sended_at
					$row->sended_at = \DB::raw('NOW()');
					//$row->save();
				}
			}

		})->dailyAt('04:00');
	}
}
