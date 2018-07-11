<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaidaRequest extends FormRequest
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
            'data' => 'required|date',
            'valor' => 'numeric',
            'observacao' => 'string',
            'setor_id' => 'numeric'

        ];
    }

    public function messages()
    {
        return [
            'data.required' => 'O campo data é obrigatório',
            'valor.numeric' => 'O campo valor é obrigatório',
            'setor.numeric' => 'O setor é obrigatório'
        ];
    }
}
