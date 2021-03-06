<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = [];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function child(){
        return $this->hasMany(Child::class);
    }
}
