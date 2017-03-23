<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'type_of_education',
        'degree',
        'inclusive_date'
    ];


}
