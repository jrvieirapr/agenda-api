<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarefaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'data' => 'required|date',
            'assunto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'realizado' => 'required|boolean',
            'tipo_id' => 'required|integer|exists:tipos,id', // Verifica se o tipo_id existe na tabela tipos
        ];
    }
}
