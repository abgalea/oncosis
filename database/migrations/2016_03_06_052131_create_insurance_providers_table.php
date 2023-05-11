<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->double('percentage')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('providers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('insurance_providers');
    }
}
