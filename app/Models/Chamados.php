<?php
 
namespace app\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Chamados extends Model
{
    protected $table = 'inovafarma_chamados';
    protected $fillable = ['id','created_at','updated_at','UserID','Chamado','Titulo','EmpresaID','Status','VersaoOK','Tipo','WI'];

}