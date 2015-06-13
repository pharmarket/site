<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\VilleRequest;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \App\User::with('ville', 'role', 'pays')->get();

		return View('admin.user.user', compact('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Récuperer list select
		$role = \App\Role::lists('label', 'id');
		$pays = \App\Pays::lists('nom', 'id');

		return View('admin.user.create',compact('role', 'pays'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
	            // Enregistrement dans la table ville
	            $city = new \App\Ville();
	            $city->pays_id      = $request->pays_id;
	            $city->nom      = $request->ville;
	            $city->cp      = $request->cp;
	            $city->adresse      = $request->adresse;

	            $city->save();
		// Enregistrement dans la table User
		$user = new \App\User;
	            $user->role_id = $request->role_id;
	            $user->ville_id = $city->id;
	            $user->nom = $request->nom;
	            $user->prenom = $request->prenom;
	            $user->mail = $request->mail;
	            $user->password = \Hash::make($request->password. \Config::get('constant.salt'));
	            $user->pseudo = $request->pseudo;
	            $user->avatar = $request->avatar;
	            $user->birth = $request->birth;
	            $user->phone = $request->phone;
            	$user->mobile = $request->mobile;

            	$user->save();

       	 	return redirect('/admin/user')->withFlashMessage("Création de l'utilisateur effectuée avec succès");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user)
	{
	            $users = \App\User::with('ville', 'role', 'pays')->find($user->id);
	            return view('admin.user.show', compact('user', 'users'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($user)
	{
		// Récuperer list select
		$role = \App\Role::lists('label', 'id');
		$ville = \App\Ville::lists('adresse', 'id');

		// table ext
		$pays = \App\Pays::lists('nom', 'id');

		return View('admin.user.edit', compact('user', 'role', 'ville','pays'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($user, EditUserRequest $request)
	{
		// Enregistrement dans la table user
		$user->role_id = $request->role_id;
		$user->nom = $request->nom;
		$user->prenom = $request->prenom;

		$countMail = \App\User::where('mail', '=', $request->mail)->count();
		if($countMail > 0){
			$user->mail = $user->mail;
		}else{
			$user->mail = $request->mail;
		}

		$user->password = \Hash::make($request->password. \Config::get('constant.salt'));
		$user->pseudo = $request->pseudo;
		$user->avatar = $request->avatar;
		$user->birth = $request->birth;
		$user->phone = $request->phone;
		$user->mobile = $request->mobile;

		$user->save();



		$ville = \App\Ville::with('pays')->where('id', '=', $user->ville_id)->first();

		$city['pays_id']      = $request->pays_id;
		$city['nom']      = $request->ville;
		$city['cp']      = $request->cp;
		$city['adresse']      = $request->adresse;

		// Enregistrement dans la table ville
		if(!empty($user->ville_id)){
			$ville= \DB::table('ville')->where('id', $user->ville_id)->update($city);
		}else{
			$ville= \DB::table('ville')->insertGetId($city);
			$user->ville_id = $ville;
			$user->save();
		}

		return redirect('/admin/user')->withFlashMessage("Mise à jour de l'utilisateur effectuée avec succès");
	}





    public function getImportCSV(){
        return View('admin.user.getImportCSV');
    }


    public function getExportCSV(){
        return View('admin.user.getExportCSV');
    }


    public function exportCSV(){
        $ville = \App\Ville::with('pays')->get();
        $table = array();

        foreach($ville as $row){
            $user = \App\User::with('ville', 'role', 'pays')->where('ville_id', '=', $row->id)->get();
            foreach($user as $e) {
                $table[] = array(
                    $e->role->label,
                    $row->pays->nom,
                    $row->nom,
                    $row->cp,
                    $row->adresse,
                    $e->nom,
                    $e->prenom,
                    $e->mail,
                    $e->password,
                    $e->pseudo,
                    $e->avatar,
                    $e->birth,
                    $e->phone,
                    $e->mobile,
                    $e->remember_token
                );
            }
        }

        \Excel::create('User', function($excel) use($table) {
            $excel->sheet('User', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, array(
                    'label_role',
                    'nom_pays',
                    'nom_ville',
                    'cp_ville',
                    'adresse_ville',
                    'nom_user',
                    'prenom_user',
                    'mail_user',
                    'password_user',
                    'pseudo_user',
                    'avatar_user',
                    'birth_user',
                    'phone_user',
                    'mobile_user',
                    'remember_token_user'
                ));
            });
        })->export('csv');
    }


    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSV(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $user = new \App\User;
                    $user->role_id = $result['role_id'];
                    $user->ville_id = $result['ville_id'];
                    $user->nom = $result['nom'];
                    $user->prenom = $result['prenom'];
                    $user->mail = $result['mail'];
                    $user->password = $result['password'];
                    $user->pseudo = $result['pseudo'];
                    $user->avatar = $result['avatar'];
                    $user->birth = $result['birth'];
                    $user->phone = $result['phone'];
                    $user->mobile = $result['mobile'];
                    $user->remember_token = $result['remember_token'];

                    $user->save();
                }
            });

            return redirect('/admin/user')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.user.getImportCSV')->withErrors($validator);
            }
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user)
	{
            //Suppression de des données dans la table user
            $user->delete();
            return redirect()->back()->withFlashMessage("Suppression de l'utilisateur effectuée avec succès");
	}

}
