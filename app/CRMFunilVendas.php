<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CRMFunilVendas extends Model
{
    protected $table = 'crm_funilvendas';
	protected $fillable = ['id','created_at','updated_at','NomeFunil','CategoriaID','OrigemID','Empresa','CNPJ','TelefoneFixo','TelefoneCelular','CEP','CodigoIbge',
			'Endereco','Numero','Bairro','Complemento','TextoDescricao'];

}
