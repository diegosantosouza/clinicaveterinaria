<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Animal extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            /*
             * animal
             */
            'nome_animal'=> 'required|min:3|max:30',
            'sexo'=> 'required',
            'especie'=> 'required',
            'raca'=> 'required',
            'idade'=> 'required',
            'castrado'=> 'required',


        ];
    }
}
