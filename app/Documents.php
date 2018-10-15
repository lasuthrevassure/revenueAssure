<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    public function patientRequest()
    {
        return $this->hasMany('App\PatientRequest');
    }
}
