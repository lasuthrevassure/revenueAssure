<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'registration_no','title', 'firstname', 'lastname','gender','dob','email','phoneno','address','lga_id','state_id'
    ];

    public function patientRequest()
    {
        return $this->hasMany('App\PatientRequest');
    }
}
