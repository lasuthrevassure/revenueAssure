<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    public function patient()
    {
        return $this->hasMany('App\Patients');
    }
}
