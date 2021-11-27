<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class ErroVersoes extends Model
{
    protected $table = 'inovafarma_erroversoes';
	protected $fillable = ['id','created_at','updated_at','Versao','DescricaoOcorrencia','Chamado','VersaoCorrigida','TipoErro'];

}