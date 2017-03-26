<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyMembership extends Model
{
    protected $fillable = [
        'company','position','inclusive_date'
    ];
}
