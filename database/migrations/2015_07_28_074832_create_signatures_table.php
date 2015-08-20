<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function ($table) {
            $table->increments('id');
            $table->string('email');
            $table->enum('role', ['admin','member']);
            $table->char('contract_id', 32);
            $table->json('meta');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('signatures');
    }
}
