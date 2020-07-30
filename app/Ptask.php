<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptask extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function child(){
        return $this->hasMany(Child::class);
    }
}
