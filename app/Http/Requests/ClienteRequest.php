<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
          //'tCnpj'         => 'unique:empresas,inscricao_federal'.$user->id,
		  'tCnpj'         => 'required',
          'tInscEstadual' => 'required',
          'tRazaoSocial'  => 'required',
          'tFantasia'     => 'required',
          'tCidade'       => 'required',
		  'tCep'          => 'required',
          'tEndereco'     => 'required',
          'tNum'          => 'required',
          'tBairro'       => 'required',
          'tTelefone'     => 'required',
		  'tContato'      => 'required',
		  
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'tCnpj.required'         => 'Este campo é obrigatório',
		  'tCnpj.unique'           => 'CNPJ já possui cadastro',
          'tInscEstadual.required' => 'Este campo é obrigatório',
          'tRazaoSocial.required'  => 'Este campo é obrigatório',
          'tFantasia.required'     => 'Este campo é obrigatório',
          'tCidade.required'       => 'Este campo é obrigatório',
		  'tCep.required'          => 'Este campo é obrigatório',
          'tEndereco.required'     => 'Este campo é obrigatório',
          'tNum.required'          => 'Este campo é obrigatório',
          'tBairro.required'       => 'Este campo é obrigatório',
          'tTelefone.required'     => 'Este campo é obrigatório',
		  'tContato.required'      => 'Este campo é obrigatório',
        ];
    }
	
}
