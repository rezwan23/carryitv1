<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestPost extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'from_district_id', 
        'from_police_station_id', 
        'to_district_id', 'to_police_station_id',  
        'from_date', 'to_date' 
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->fill(['user_id' => auth()->user()->id]);
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toDistrict()
    {
        return $this->belongsTo(District::class, 'to_district_id', 'district_id');
    }

    public function fromDistrict()
    {
        return $this->belongsTo(District::class, 'from_district_id', 'district_id');
    }
    public function toPS()
    {
        return $this->belongsTo(PoliceStation::class, 'to_district_id', 'district_id');
    }

    public function fromPS()
    {
        return $this->belongsTo(PoliceStation::class, 'from_district_id', 'district_id');
    }
}
