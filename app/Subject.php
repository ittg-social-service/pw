<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function references()
    {
        return $this->belongsToMany('App\Reference');
    }
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }
}
