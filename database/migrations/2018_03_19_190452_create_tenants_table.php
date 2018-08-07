<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation');
            $table->string('gender');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('date_of_birth');
            $table->string('occupation');
            $table->string('address');
            $table->string('state');
            $table->string('phone');
            $table->integer('agent_id');
            $table->string('referral_code');
            $table->string('photo');
            $table->integer('user_id');
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
        Schema::dropIfExists('tenants');
    }
}
