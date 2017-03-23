<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'membership_id',
        'company',
        'inclusive_date',
        'position'
    ];
}
