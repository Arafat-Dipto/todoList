<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignName extends Model
{
    protected $guarded = [];

    public function task(){
        return $this->belongsTo(Ptask::class);
    }

}
