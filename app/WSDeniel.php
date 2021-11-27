<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class WSDeniel extends Model
{
    protected $table = 'wsdeniel';
	protected $fillable = ['id','user_created','user_updated','equipamento','temperatura','umidade','luminosidade'];

}