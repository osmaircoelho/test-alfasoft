<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:6'],
            'contato' => [
                'required',
                'digits:9',
                'unique:contacts,contato,NULL,id,deleted_at,NULL',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'unique:contacts,email,NULL,id,deleted_at,NULL',
            ],
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome eh obrigatorio.',
            'nome.min' => 'O nome deve ter pelo menos 6 caracteres.',
            'contato.required' => 'O contato eh obrigatrio.',
            'contato.digits' => 'O contato deve ter exatamente 9 digitos.',
            'contato.unique' => 'Ja existe um contato com este numero.',
            'email.required' => 'O e-mail eh obrigatorio.',
            'email.email' => 'Informe um endereço de e-mail valido.',
            'email.unique' => 'Ja existe um contato com este e-mail.',
        ];
    }
}
