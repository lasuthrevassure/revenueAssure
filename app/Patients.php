<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'joe_number','title', 'firstname', 'lastname','gender','dob','email','phoneno','address','lga_id','state_id'
    ];
}
