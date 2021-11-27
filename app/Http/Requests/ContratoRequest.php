<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
        $id = $this->segment(3);
		
		return [
		  'tNomeContrato' => "required|unique:contratos,NomeContrato,{$id},id",
		  'tContrato' => 'required',
		  'tValidade' => 'required',
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
          'tNomeContrato.required' => 'Este campo é obrigatório',
		  'tNomeContrato.unique' => 'Esse nome de contrato já está sendo utilizado.',
		  'tContrato.required' => 'Este campo é obrigatório',
		  'tValidade.required' => 'Este campo é obrigatório',
        ];
    }
	
}
