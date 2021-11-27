<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteContatos extends Model
{
    protected $table = 'site_contatos';
	protected $fillable = ['id','user_created','user_updated','NomeCompleto','NomeFarmacia','Assunto','MelhorHorario','Email','Telefone','Assumido'];

}