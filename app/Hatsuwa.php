<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hatsuwa;
use Validator;

class Hatsuwa extends Model
{
    //
    public function tags()
    {
        return $this->belongsToMany('App\Tag','hatsuwas_tags'); 
    }
}
