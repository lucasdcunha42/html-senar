<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicitacaoEmpresa extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O Nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'E-mail inválido'
        ];
    }
}
