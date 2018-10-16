<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentRequests extends Model
{
    //

    public function patientRequest()
    {
        return $this->belongsTo('App\PatientRequest','request_id');
    }

    public function document()
    {
        return $this->belongsTo('App\Documents','document_id');
    }
}
