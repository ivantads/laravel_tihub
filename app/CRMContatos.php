<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CRMContatos extends Model
{
    protected $table = 'crm_contatos';
	protected $fillable = ['id','created_at','updated_at','NomeContato','Telefone','Email','Observacao'];

}
