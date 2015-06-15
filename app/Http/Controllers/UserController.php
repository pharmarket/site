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

		//si on utilise la methode POST
		if (\Request::isMethod('post')){

			//On recupere les differents inputs
			$mail = \Input::get('mail');
			$password = \Input::get('password'). \Config::get('constant.salt');
			$remember = \Input::get('remeber');

			// si l'email et le mot de passe sont bons
			if (\Auth::attempt(['mail' => $mail, 'password' =>$password], $remember)) {

				//Si le role de l'utilisateurs simple utilisateur
				if(\Auth::user()->role->id == \Config::get('constant.role_customer')){

					//on redigige vers la home
					return redirect()->intended('/');
				}else{
					//Si on est un administrateur ou un moderateur

					//sinon on redirige vers la page admin
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
		//On empeche de changer la langue lorsqu'il y a un panier, par ce que sa change la devise
		$count = \Cart::count();
		if(empty($count)){
			\Session::put('locale', $langue);
		}
		return \Redirect::back();
	}

	public function account(\Request $request) {
		$message = '';
		$pays = \App\Pays::lists('nom', 'id');
		if (\Request::isMethod('post')){
			$v = \Validator::make(\Request::all(), [
				'mail' => 'required|max:100|email|unique:user,mail'. ((\Auth::check()) ? ','.\Auth::user()->id:''),
				'pseudo' => 'required|max:45',
				'ville#pays_id' => 'required|exists:pays,id',
				'ville#adresse' => 'required|max:100',
				'ville#cp' => 'required|max:45',
				'ville#nom' => 'required|max:45',
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

				//On ajoute l'image
				if(\Input::file('avatar')){
					$destinationPath = public_path() . '/img/user/';
					$fileName = 'user_' .strtotime('now').'.'.\Input::file('avatar')->getClientOriginalExtension();
					\Input::file('avatar')->move($destinationPath, $fileName);
					$user['avatar'] = 'img/user/' .$fileName;
				}

				//On enregistre les infos
				if(!empty(\Auth::user()->ville_id)){
					$ville= \DB::table('ville')->where('id', \Auth::user()->ville->id)->update($ville);
				}else{
					$ville= \DB::table('ville')->insertGetId($ville);
					$user['ville_id'] = $ville;
				}
				\DB::table('user')->where('id', \Auth::user()->id)->update($user);

				return \Redirect::back();
			}

			return view('front.user.account', compact('pays', 'message'));
		}

		public function suscribe(\Request $request) {
			// Initialisation du message
			$message = '';

			//on recupere la liste de tous les pays
			$pays = \App\Pays::lists('nom', 'id');

			//si on est dans la methode POST
			if (\Request::isMethod('post')){

				//on verifie le contenue des champs inputs
				$v = \Validator::make(\Request::all(), [
					'mail' => 'required|max:100|email|unique:user,mail'. ((\Auth::check()) ? ','.\Auth::user()->id:''),
					'pseudo' => 'required|max:45',
					'password' => \Auth::check() ?'' :'required|max:45|confirmed',
					'g-recaptcha-response' => 'required',
					]);

					//si le captcha n'est bien remplis
					if ($v->fails()  ||  !\App\Library\Recaptcha::checkResponse(\Request::get('g-recaptcha-response'))) { return redirect()->back()->withInput()->withErrors($v->errors()); }

					$user = \Input::except(['_token', 'password_confirmation', 'avatar', 'g-recaptcha-response']);

					//On ajout le role client
					$user['role_id'] = \Config::get('constant.role_customer');

					$user['password'] = \Hash::make($user['password']. \Config::get('constant.salt'));

					\DB::table('user')->insertGetId($user);

					$message = \Lang::get('user.suscribe_confirm');

					// envoie du mail
					\Mail::send('mail.suscribe-'.\Lang::getLocale(), compact('user'), function($message) use ($user){
						$message->to($user['mail'], '')->subject(\Lang::get('user.suscribe_mail_title'));
					});
				}

				return view('auth.register', compact('pays', 'message'));
			}

			public function home(){
				return view('front.user.home');
			}
		}
