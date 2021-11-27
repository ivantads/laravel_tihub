<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadVersoes extends Model
{
    protected $table = 'downloads_inovafarma';
	protected $fillable = ['id','created_at','updated_at','TipoDownload','Descricao','Arquivo','SiteDownload','SiteCopy','Versao','Releases','NotaVersao'];

}
