<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CRMFunilVendasContatos extends Model
{
    protected $table = 'crm_funilvendas_contatos';
	protected $fillable = ['id','created_at','updated_at','FunilVendaID','CrmContatoID'];

}
