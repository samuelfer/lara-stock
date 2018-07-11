<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
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
            'nota_fiscal' => 'numeric',
            'valor' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'data.required.date' => 'O campo de de data é obrigatório',
            'nota_fiscal.numeric' => 'O campo de nota fiscal deve ser um número',
            'valor.required' => 'O campo de valor é obrigatório',

        ];
    }
}
