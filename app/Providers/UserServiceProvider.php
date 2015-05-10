<?php
/**
* Created by PhpStorm.
* User: Bilel
* Date: 27/03/2015
* Time: 23:46
*/
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;
class UserServiceProvider extends ServiceProvider {
	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register() {
		\App::bind('user', 'App\User');
	}
}
