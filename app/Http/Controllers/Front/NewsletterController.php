<?php namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller{
	public function post(\Request $request){
		$v = \Validator::make(\Request::all(), [
		        'mail' => 'required|email|unique:newsletter_mail,mail'
		]);
		if ($v->fails()){ return redirect()->back()->withInput()->withErrors($v->errors()); }
		$newsletter_mail = new \App\Newsletter_mail();
		$newsletter_mail->mail =  \Input::get('mail');
		$newsletter_mail->langue_id = \App\Langue::where('code', \Lang::getLocale())->first()->id;
		$newsletter_mail->save();

		return back();
	}
}
