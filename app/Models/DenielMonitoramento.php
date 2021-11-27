<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class DenielMonitoramento extends Model
{
    protected $table = 'monitoramento';
	protected $fillable = ['id','created_at','updated_at','Token','Tipo','Temperatura','Umidade','Luminosidade'];

}