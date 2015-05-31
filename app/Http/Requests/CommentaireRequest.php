<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
class CommentaireRequest extends Request {
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
            'user_id' => 'required|numeric',
            'produit_id' => 'required|numeric',
            'nom' => 'required|max:45',
            'description' => 'required',
            'note' => 'required|numeric'
        ];
    }
}