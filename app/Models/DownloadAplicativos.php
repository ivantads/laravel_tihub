<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadAplicativos extends Model
{
    protected $table = 'downloads_aplicativos';
	protected $fillable = ['id','created_at','updated_at','TipoDownload','Descricao','Arquivo','SiteDownload','SiteCopy','SiteCopyOficial','Versao','ImagePath'];

}
