<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfMembership extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'type_of_application',
        'membership_desc'
    ];
}
