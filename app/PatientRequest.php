<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'user_id','patient_id', 'document_id'
    ];

    public function document()
    {
        return $this->belongsTo('App\Documents','document_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patients','patient_id');
    }

    public function payment()
    {
        return $this->hasMany('App\Payments');
    }
}
