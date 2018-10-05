<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'request_id','user_id', 'transaction_id', 'receipt_no','bill_reference','amount'
    ];

    public function request()
    {
        return $this->belongsTo('App\PatientRequest','request_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
