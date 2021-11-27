<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class SiteNewsletter extends Model
{
    protected $table = 'site_newsletter';
	protected $fillable = ['id','user_created','user_updated','Email'];

}