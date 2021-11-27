<?php

namespace App;

use Illuminate\Database\Eloquent\Model;





class Links extends Model
{

    protected $fillable = [
      
        'id','descricao','link'];
   

        protected $primaryKey = 'id';
}
