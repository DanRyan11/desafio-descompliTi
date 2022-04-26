<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEndereco extends FormRequest
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
            'logradouro' => ['required','min:3'],
            'numero'     => ['required','min:1'],
            'bairro'     => ['required','min:3'],
            'cidade_id'  => ['required','min:1'],
        ];
    }
}
