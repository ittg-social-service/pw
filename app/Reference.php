<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public function referenceType()
    {
        return $this->belongsTo('App\ReferenceType');
    }
    public function subjects()
    {
      return $this->belongsToMany('App\Subject');
    }
}
