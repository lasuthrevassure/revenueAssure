<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientRequest extends Model
{
    use SoftDeletes;
    
    protected $table = 'requests';

    protected $fillable = [
        'user_id','patient_id', 'document_id'
    ];

    protected $dates = ['deleted_at'];

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
        return $this->hasOne('App\Payments','request_id');
    }
}
