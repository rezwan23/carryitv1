<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = ['user_id', 'mobile_number', 'verification_number'];
}
