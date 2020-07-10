<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carry extends Model
{
    protected $fillable = [
        'carrier_post_id', 'description', 'weight', 'requested_by', 'received_by', 'received_by_mobile_number', 'payable_amount', 'status', 'passphrase',
    ];

    public function carrierPost()
    {
        return $this->belongsTo(CarrierPost::class);
    }

    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}
