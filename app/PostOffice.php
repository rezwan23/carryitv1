<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOffice extends Model
{
    protected $fillable = ['district_id', 'postal_code', 'name'];
}
