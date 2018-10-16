<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    //
    protected $fillable = [
        'owner_firstname', 'owner_lastname', 'owner_phone','owner_email','owner_role','signature'
    ];
}
