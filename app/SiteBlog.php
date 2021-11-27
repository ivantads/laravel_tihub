<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteBlog extends Model
{
    protected $table = 'site_blog';
	protected $fillable = ['id','user_created','user_updated','Titulo','Descricao','Origem','URL','Data','Imagem'];

}