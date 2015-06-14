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
		$schedule->command('composer self-update')
				 ->dailyAt('01:00');
		$schedule->command('composer update')
				 ->dailyAt('01:30');

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
	}

}
