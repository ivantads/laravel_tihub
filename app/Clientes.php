<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
	protected $fillable = [
			'RazaoSocial','NomeFantasia','NomeApresentacao','CNPJ','CNPJLimpo','IE','Endereco','ContratoInova','Numero','Bairro','Complemento','CEP','CodigoIbge','TelefoneFixo','TelefoneFixo2',
			'TelefoneCelular','TelefoneCelular2','NomeContato','Representante','RedeID','Filial','FranquiaID','Email','Site','Situacao','Observacao','UserID','CodigoAntigo','Sistema',
			'MegaEmail','MegaSenha','MegaChaveRecuperacao','ServidorUsuario','ServidorSenha','SqlSenha','ServidorIP','EmailRT','SenhaRT','NomeRT','LogmeinRedeID','ServidorProcessador','ServidorMemoria'];

 }
