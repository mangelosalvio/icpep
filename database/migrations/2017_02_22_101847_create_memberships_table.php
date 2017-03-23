<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_memberships', function(Blueprint $table){
            $table->increments('id');
            $table->char('type_of_application',1);
            $table->string('membership_desc');
        });

        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->date('date_of_birth');
            $table->string('civil_status')->nullable();
            $table->char('gender',1);
            $table->string('place_of_birth');
            $table->string('religion')->nullable();
            $table->string('region')->nullable();

            $table->string('email');
            $table->string('home_number')->nullable();
            $table->string('business_number')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('or_no')->nullable();
            $table->date('payment_date')->nullable();
            $table->char('type_of_application',1);
            $table->integer('type_of_membership')->unsigned();
            $table->char('type_of_member',1);

            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('position')->nullable();
            $table->text('specialization')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_memberships');
        Schema::dropIfExists('memberships');
    }
}
