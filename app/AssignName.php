<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignName extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function children(){
        return $this->belongsTo(Child::class);
    }
}
