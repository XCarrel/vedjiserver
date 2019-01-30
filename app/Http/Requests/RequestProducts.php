<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProducts extends FormRequest
{
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
            'product' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'stock' => 'required|regex:/^[0-9]*$/',
            'price' => 'required|regex:/^[0-9]*$/',
            'picture' => 'required',
            'updateName' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'updateStok' => 'required|regex:/^[0-9]*$/',
            'updatePrice' => 'required|regex:/^[0-9]*$/'
        ];
    }

    /** 
     * Change the value of the errors messages
     * 
     * @return array
    */
    public function messages()
    {
        return [
            'product.required' => 'Le champ ne doit pas être vide',
            'product.min'  => 'Il faut au moins 4 caractères',
            'product.regex'  => 'Vous devez utiliser que des lettres',
            'stock.required' => 'Le champ ne doit pas être vide',
            'stock.regex'  => 'Vous devez utiliser que des chiffres',
            'price.required' => 'Le champ ne doit pas être vide',
            'price.regex'  => 'Vous devez utiliser que des chiffres',
            'picture.required' => 'Veuillez ajouter une photo',
            'updateName.required' => 'Le champ ne doit pas être vide',
            'updateName.min'  => 'Il faut au moins 4 caractères',
            'updateName.regex'  => 'Vous devez utiliser que des lettres',
            'updateStok.required' => 'Le champ ne doit pas être vide',
            'updateStok.regex'  => 'Vous devez utiliser que des chiffres',
            'updatePrice.required' => 'Le champ ne doit pas être vide',
            'updatePrice.regex'  => 'Vous devez utiliser que des chiffres'
        ];
    }
}
