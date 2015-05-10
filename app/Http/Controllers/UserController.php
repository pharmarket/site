<?php namespace App\Http\Controllers;

class UserController extends Controller {
	/**
	* GHet user by ID
	*
	* @return Response
	*/
	public function show($user)
	{
		return $user;
	}
	/**
	* GHet user by ID
	*
	* params where string
	*
	* @return Response
	*/
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \User::whereRaw($where)->get(); }
		else{ return \User::get(); }
	}
	/**
	* GHet user by ID
	*
	* @return Response
	*/
	public function store()
	{
		$data = \Input::get('data');
		\User::create($data);
	}
	/**
	* GHet user by ID
	*
	* @return Response
	*/
	public function destroy($user)
	{
		$user->delete();
	}
	/**
	* Get user by ID
	*
	* @return Response
	*/
	public function update($user)
	{
		$data = \Input::get('data');
		$user->update($data);
	}

	public function login() {
		if (\Request::isMethod('post')){
			$mail = \Input::get('mail');
			$password = \Input::get('password'). \Config::get('constant.salt');
			$remember = \Input::get('remeber');

			if (\Auth::attempt(['mail' => $mail, 'password' =>$password], $remember)) {
				if(\Auth::user()->role->id == \Config::get('constant.role_customer')){
			            	return redirect()->intended('/');
				}else{
					return \Redirect::to(route('accueil'));
				}
			}
		}

		return view('auth.login');
	}

	public function logout(){
		\Auth::logout();
		return \Redirect::back();
	}

	public function language($langue){
		\Session::put('locale', $langue);
		return \Redirect::back();
	}

	public function suscribe(\Request $request) {
		$message = '';
		$pays = \App\Pays::lists('nom', 'id');
		if (\Request::isMethod('post')){
			$v = \Validator::make(\Request::all(), [
			        'mail' => 'required|max:100|email|unique:user,mail'. ((\Auth::check()) ? ','.\Auth::user()->id:''),
			        'pseudo' => 'required|max:45',
			        'password' => \Auth::check() ?'' :'required|max:45|confirmed',
			        'ville#pays_id' => 'required|exists:pays,id',
			        'ville#adresse' => 'required|max:100',
			        'ville#cp' => 'required|max:45',
			        'ville#nom' => 'required|max:45',
			        'nom' => 'required|max:45',
			        'prenom' => 'required|max:45',
			        'birth' => 'required|date_format:Y-m-d|after:1900-01-01|before:now',
			        'phone' => 'required_without:mobile|numeric',
			        'mobile' => 'required_without:phone|numeric',
			        'avatar' => 'image',
			]);
			if ($v->fails()){ return redirect()->back()->withInput()->withErrors($v->errors()); }

			$user = \Input::except(['_token', 'password_confirmation', 'avatar']);

			//Onrecupere les infos de la ville
			foreach ($user as $key => $qty) {
				if(strpos($key, 'ville') === 0){
					list(,$field) = explode("#", $key);
					//Oncrée un tableau avec les infos de la ville
					$ville[$field] = $user[$key];
					//On supprime les infos du tableau user
					unset($user[$key]);
				}
			}

			//On ajout le role client
			$user['role_id'] = \Config::get('constant.role_customer');

			//On crypte le mot de passe
			if(!\Auth::check()){
				$user['password'] = \Hash::make($user['password']. \Config::get('constant.salt'));
			}

			//On ajoute l'image
			if(\Input::file('avatar')){
				$destinationPath = public_path() . '/img/user/';
				$fileName = 'user_' .strtotime('now').'.'.\Input::file('avatar')->getClientOriginalExtension();
				\Input::file('avatar')->move($destinationPath, $fileName);
				$user['avatar'] = 'img/user/' .$fileName;
			}

			if(!\Auth::check()){
				//On enregistre les infos
				$ville= \DB::table('ville')->insertGetId($ville);
				$user['ville_id'] = $ville;
				\DB::table('user')->insertGetId($user);

				$message = \Lang::get('user.suscribe_confirm');

				// envoie du mail
				\Mail::send('mail.suscribe-'.\Lang::getLocale(), compact('user'), function($message) use ($user){
				    	$message->to($user['mail'], '')->subject(\Lang::get('user.suscribe_mail_title'));
				});
			}else{
				//On enregistre les infos
				$ville= \DB::table('ville')->where('id', \Auth::user()->ville->id)->update($ville);
				\DB::table('user')->where('id', \Auth::user()->id)->update($user);

				return \Redirect::back();
			}
		}

		return view('auth.register', compact('pays', 'message'));
	}
}
