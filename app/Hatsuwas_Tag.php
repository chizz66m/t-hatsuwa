<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hatsuwas_Tag extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = ['hatsuwas_id','tag_id'];
}
