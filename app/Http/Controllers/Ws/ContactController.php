<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

    /**
     * Store contact
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::get('data');
        //dd($data);

        $validator = \Validator::make(
            $data,
            array(
                'langue_id' => 'required|numeric',
                'mail' => 'required|email|unique:contact',
                'message' => 'required',
                'sujet' => 'required|max:100',
                'nom' => 'required|max:100'
            )
        );

        if($validator->fails()){
            return $validator->errors();
        }
        else {
            if ($contact = \App\Contact::create($data)) {
                return response()->json(['contact' => $contact], 200);
            } else {
                return response()->json('', 400);
            }
        }
    }

}
