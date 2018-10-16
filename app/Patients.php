<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patients extends Model
{
    use SoftDeletes;
    
    protected $table = 'patients';

    protected $fillable = [
        'registration_no','title', 'firstname', 'lastname','gender','dob','email','phoneno','address','lga_id','state_id'
    ];

    protected $dates = ['deleted_at'];

    public function patientRequest()
    {
        return $this->hasMany('App\PatientRequest');
    }

    public function patstate()
    {
        return $this->belongsTo('App\States','id','state_id');
    }

    public function lga()
    {
        return $this->belongsTo('App\Locals','lga_id','local_id');
    }
}
