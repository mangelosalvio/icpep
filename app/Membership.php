<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'present_address',
        'permanent_address',
        'date_of_birth',
        'civil_status',
        'gender',
        'place_of_birth',
        'religion',
        'region',
        'email',
        'home_number',
        'business_number',
        'mobile_number',
        'or_no',
        'payment_date',
        'type_of_application',
        'type_of_membership',
        'type_of_member',
        'company_name',
        'company_address',
        'position',
        'specialization',
    ];
    public function educations(){
        return $this->hasMany(Education::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function companyMemberships(){
        return $this->hasMany(CompanyMembership::class);
    }
}
