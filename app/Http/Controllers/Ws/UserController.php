<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\User::whereRaw($where)->get(); }
		else{ return \App\User::get(); }
	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function store()
	{
		// Recupère les données postées par le formulaire
		$data = \Input::get('data');
		// Recupère la liste des produits
		$pays = \App\Pays::lists('nom', 'id');

		// Règles de validation
		$validator = \Validator::make(
            $data,
            array(
                'mail' 			=> 'required|max:100|email|unique:user,mail',
			    'pseudo' 		=> 'required|max:45',
			    'password' 		=> 'required|max:45|same:repassword',
            )
        );

		// Verification des règles de validation
		if ($validator->fails()){ 
			return $validator->errors();
		}else{
			$user = new \App\User;
			$user->mail = $data['mail'];
			$user->pseudo = $data['pseudo'];
			// On ajout le role client 
			$user->role_id = \Config::get('constant.role_customer');
			// Cryptage du mot de passe
			$user->password = \Hash::make($data['password']. \Config::get('constant.salt'));
			// Insertion en base de données 
			if($user->save()){
				return response()->json(['user' => $user], 200);
			}else{
				return response()->json('Internal Server Error', 400);
			}
		}
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
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function update($user)
	{
		$data = \Input::get('data');

		$user->update($data);
	}

	/**
	 * Store a newly created resource in storage
	 *
	 * @return Response
	 */
	public function subscribe(){

		
	}

}
