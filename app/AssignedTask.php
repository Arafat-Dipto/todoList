<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    protected $guarded = [];

    public function tasks(){
        return $this->belongsTo(Ptask::class);
    }
}
