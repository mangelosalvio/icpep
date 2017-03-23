<?php

use App\TypeOfMembership;
use Illuminate\Database\Seeder;

class TypeOfMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfMembership::create([
            'type_of_application' => 'N',
            'membership_desc' => 'Php 400.00/year'
        ]);
        TypeOfMembership::create([
                'type_of_application' => 'N',
                'membership_desc' => 'Php 1,000.00/year'
        ]);
        TypeOfMembership::create([
            'type_of_application' => 'N',
            'membership_desc' => 'Php 600.00/year'
        ]);
        TypeOfMembership::create([
            'type_of_application' => 'N',
            'membership_desc' => 'Php 1,500.00/year',
        ]);
        TypeOfMembership::create([
            'type_of_application' => 'R',
            'membership_desc' => 'Associate Php 1,000.00/3 years',
        ]);
        TypeOfMembership::create([
            'type_of_application' => 'R',
            'membership_desc' => 'Regular Php 1,500.00/3 years',
        ]);
        TypeOfMembership::create([
            'type_of_application' => 'R',
            'membership_desc' => 'Lifetime Php 5,000.00',
        ]);
    }
}
