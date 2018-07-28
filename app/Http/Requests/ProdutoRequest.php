<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|min:3|unique:produtos',
            'descricao' => 'min:5',
            'peso' => '',
            'volume' => '',
            'tipo_unidade_id' => 'required',
            'categoria_id' => 'required',
            'fornecedor_id' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo de nome do produto é obrigatório',
            'descricao.min' => 'O campo descrição deve conter pelo menos 3 caracteres',
            'tipo_unidade_id.required' => 'O campo tipo de unidade é obrigatório',
            'categoria_id.required' => 'O campo tipo de categoria é obrigatório',
            'fornecedor_id.required' => 'O campo fornecedor é obrigatório',
//            'peso' => 'nullable|decimal'
        ];
    }
}
