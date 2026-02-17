<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        $contact = $this->route('contact');

        return [
            'nome' => ['required', 'string', 'min:6'],
            'contato' => [
                'required',
                'digits:9',
                Rule::unique('contacts', 'contato')
                    ->ignore($contact->id)
                    ->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('contacts', 'email')
                    ->ignore($contact->id)
                    ->whereNull('deleted_at'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome eh obrigatorio.',
            'nome.min' => 'O nome deve ter pelo menos 6 caracteres.',
            'contato.required' => 'O contato eh obrigatorio.',
            'contato.digits' => 'O contato deve ter exatamente 9 digitos.',
            'contato.unique' => 'Ja existe um contato com este numero.',
            'email.required' => 'O e-mail eh obrigatório.',
            'email.email' => 'Informe um endereço de e-mail valido.',
            'email.unique' => 'Ja existe um contato com este e-mail.',
        ];
    }
}
