<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteDepoimento extends Model
{
    protected $table = 'site_depoimento';
	protected $fillable = ['id','user_created','user_updated','Depoimento','Cliente','Cargo','ImageCliente','Ativo'];

}