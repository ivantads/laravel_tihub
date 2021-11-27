<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteServicos extends Model
{
    protected $table = 'site_servicos';
	protected $fillable = ['id','user_created','user_updated','Servico','Descricao','Icone'];

}