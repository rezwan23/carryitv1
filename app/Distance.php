<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $fillable = ['from', 'to', 'distance'];
}
