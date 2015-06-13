<?php namespace App\Library;

class Recaptcha{

	public static function checkResponse($response){
		if(empty($response)){
			return false;
		}
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.\Config::get('constant.recaptcha_secret_key').'&response='. $response;
		return json_decode(file_get_contents($url))->success;
	}
}
