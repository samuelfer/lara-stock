<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    public function rules(Request $request)
    {
        if (Route::getCurrentRoute()->getName() == "saida.store") {
            return [
                'data' => 'required|date',
                'valor' => 'numeric',
                'observacao' => 'string',
                'pessoa_id' => 'numeric'

            ];
        }else{
            $rule = [
                'data' => 'required|date',
                'valor' => 'numeric',
                'pessoa_id' => 'numeric',
            ];
            return $rule;
        }
    }

    public function messages()
    {
        return [
            'data.required' => 'O campo data é obrigatório',
            'valor.numeric' => 'O campo valor é obrigatório',
            'pessoa.numeric' => 'O cliente é obrigatório'
        ];
    }
}
