<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GravarNoticias extends FormRequest
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
            'titulo':'required|max:255',
            'texto':'required',
            'publicacao':'required',
            'user_id':'required'
        ];
    }

    public function messages()
    {
      return [
        'titulo.required' =>  'O título é obrigatório',
        'titulo.max'  =>  'Tamanho máximo para o título é de 255 caracteres',
        'publicacao.required' =>  'A data de publicação é obrigatória',
        'user_id.required'  =>  'Usuário obrigatório'
      ];
    }

}
