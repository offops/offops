<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function ($table) {
            $table->char('id', 32);
            $table->integer('company_id')->unsigned();
            $table->integer('workspace_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->json('fee_schedule_matrix')->default('{}');

            $table->primary('id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('workspace_id')->references('id')->on('workspaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }
}
