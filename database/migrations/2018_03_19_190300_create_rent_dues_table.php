<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_dues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->string('status');
            $table->string('due_date');
            $table->string('payment_date')->nullable();
            $table->bigInteger('amount');
            $table->string('rentType');
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
        Schema::dropIfExists('rent_dues');
    }
}
