<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function hatsuwas()
    {
        return $this->belongsToMany('App\Hatsuwa','hatsuwas_tags'); 
    }

    public $timestamps = false;
    
    protected $fillable = ['name'];


}
