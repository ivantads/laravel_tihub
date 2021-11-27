<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteLogo extends Model
{
    protected $table = 'site_clientesinova';
	protected $fillable = ['id','user_created','user_updated','Logo','Cliente','Site','Ativo'];

}