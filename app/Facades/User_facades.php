<?php
/**
* Created by PhpStorm.
* User: Bilel
* Date: 27/03/2015
* Time: 00:38
*/
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class User_facades extends Facade{
	protected static function getFacadeAccessor() { return 'user'; }
}
