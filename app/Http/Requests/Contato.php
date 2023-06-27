<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contato extends FormRequest
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

    public function rules()
    {
        return [
            'assunto' => 'required|exists:contatos_assuntos,id',
            'nome' => 'required',
            'email' => 'required|email',
            'comentario' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'assunto.required' => 'Escolha um assunto',
            'assunto.exists' => 'Assunto inexistente',
            'nome.required' => 'O Nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'E-mail inválido',
            'comentario.required' => 'Preencha o comentário'
        ];
    }
}
