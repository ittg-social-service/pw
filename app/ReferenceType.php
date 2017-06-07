<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceType extends Model
{
      protected $table = 'reference_types';
      protected $fillable = ['description', 'type'];

}
