<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Scripts extends Model
{
    protected $table = 'inovafarma_scripts';
	protected $fillable = ['id','created_at','updated_at','DescricaoScript','CodigoScript','InformacoesScript'];

}