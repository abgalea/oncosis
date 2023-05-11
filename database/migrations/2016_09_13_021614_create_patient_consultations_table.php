<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->index();
            $table->integer('provider_id')->unsigned()->index();
            $table->integer('insurance_provider_id')->unsigned()->nullable()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('updated_by')->unsigned()->index();
            $table->date('consulta_fecha')->nullable();
            $table->boolean('recaida')->default(false)->index();
            $table->enum('consulta_tipo', ['SEGUIMIENTO', 'PRIMERA VEZ', 'RECAIDA'])->nullable();
            $table->string('consulta_peso')->nullable();
            $table->string('consulta_altura')->nullable();
            $table->string('consulta_superficie_corporal')->nullable();
            $table->string('consulta_presion_arterial')->nullable();
            $table->longText('consulta_resumen')->nullable();
            $table->boolean('consulta_cobrable')->default(true)->index();
            $table->boolean('consulta_pagada')->default(false)->index();
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('providers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('insurance_provider_id')
                  ->references('id')
                  ->on('insurance_providers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('updated_by')
                  ->references('id')
                  ->on('users')
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
        Schema::drop('patient_consultations');
    }
}
