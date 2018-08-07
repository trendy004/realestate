<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_referrals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->string('status');
            $table->integer('referred_by');
            $table->float('commission');
            $table->integer('updated_by')->nullable();
            $table->string('updated_date')->nullable();
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
        Schema::dropIfExists('tenant_referrals');
    }
}
