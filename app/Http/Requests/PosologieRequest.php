<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PosologieRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'produit'	=> 'required',
			'type' 		=> 'required',
			'min' 		=> 'required|numeric',
			'max' 		=> 'required|numeric',
			'coeff' 	=> 'required|regex:/^[-+]?[0-9]*\.?[0-9]+$/'
		];
	}
}