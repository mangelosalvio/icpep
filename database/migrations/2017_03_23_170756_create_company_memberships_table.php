<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('membership_id')->unsigned();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('inclusive_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_memberships');
    }
}
