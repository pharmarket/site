<?php namespace App\Http\Controllers\Front;

class ContactController extends Controller {

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function show($contact)
	{
		return $contact;
	}
	public function index(\Request $request)
	{
		$success = false;
		if (\Request::isMethod('post')){
			$v = \Validator::make(\Request::all(), [
			        'mail' => 'required|max:100|email',
			        'nom' => 'required|max:100',
			        'sujet' =>'required|max:100',
			        'message' => 'required',
			]);
			if ($v->fails()){ return redirect()->back()->withInput()->withErrors($v->errors()); }

			$success = true;

			$data = \Input::except(['_token', 'newsletter']);
			$data['done'] = 0;

			//On ajoute la langue
			$data['langue_id'] = \App\Langue::where('code', \Lang::getLocale())->lists('id')[0];

			//Si l'utilisateur est d'accord on l'inscrit à la newsletter
			if(\Input::get('newsletter')){
				//On verifie que le mail n'existe pas deja
				$mail = \DB::table('newsletter_mail')->where('mail', $data['mail'])->get();
				if(empty($mail)){
					\DB::table('newsletter_mail')->insert(['mail' => $data['mail'], 'langue_id' => $data['langue_id']]);
				}
			}

			\DB::table('contact')->insert($data);
		}
		return \View::make('front.contact.contact', compact('success'));
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::get('data');

		\App\Contact::create($data);
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function destroy($contact)
	{
		$contact->delete();
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function update($contact)
	{
		$data = \Input::get('data');

		$contact->update($data);
	}

}
