<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
