<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoInscricao extends FormRequest
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
            'cpf' => 'required|numeric|digits:11|cpf',
            'email' => 'email',
            'cidade' => 'required',
            'atividade' => 'nullable|alpha',
            'telefone' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.numeric' => 'O CPF deve conter apenas números.',
            'cpf.digits' => 'O CPF deve ter exatamente 11 dígitos.',
            'cpf.cpf' => 'O CPF é inválido.',
            //'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cidade.exists' => 'A cidade selecionada é inválida.',
            //'atividade.required' => 'O campo atividade é obrigatório.',
            'atividade.alpha' => 'A atividade deve conter apenas letras se preenchida.',
        ];
    }
}
