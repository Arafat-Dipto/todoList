<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Child extends Authenticatable
{
    protected $guarded = [];

    public function users(){
        return $this->hasMany('App\User');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
