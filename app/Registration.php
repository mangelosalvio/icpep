<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'company_name',
        'company_address',
        'mobile_number',
        'email',
        'type_of_participant',
        'or_number',
        'or_date',
    ];
}
