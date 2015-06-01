<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CguRequest extends Request {

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
			'langue_id' => 'required|numeric|unique:cgu',
            'title' => 'required|max:255',
            'cgu' => 'required'
		];
	}

}
