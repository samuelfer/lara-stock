<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
    public function rules(Request $request)
    {
        if (Route::getCurrentRoute()->getName() == "entrada.store") {
            return [
                'data' => 'required|date',
                'nota_fiscal' => 'numeric',
                'valor' => 'required',

            ];
        } else {
            $rule = [
                'data' => 'required|date',
                'nota_fiscal' => 'numeric',
                'valor' => 'required',
            ];
            return $rule;
        }
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