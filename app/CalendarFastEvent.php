<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarFastEvent extends Model
{
    //use SoftDeletes;

    protected $fillable = ['title', 'start', 'end', 'color'];
}
