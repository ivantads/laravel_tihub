<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class HuggyAtendimentosClientes extends Model
{
    protected $table = 'huggy_atendimentos_clientes';
	protected $fillable = ['id','created_at','updated_at','CustomerID','CustomerMessengerID','ClienteID','NomeContato'];

}