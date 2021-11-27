<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Contratos extends Model
{
    protected $table = 'contratos';
	protected $fillable = ['id','user_created','user_updated','UserID','UserIDUpdated','Tipo','NomeContrato','Versao','TextoContrato','Validade'];

}