<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('updated_by')->unsigned()->index();
            $table->integer('insurance_provider_id')->unsigned()->nullable()->index();
            $table->integer('pathology_location_id')->unsigned()->index();
            $table->integer('protocol_id')->unsigned()->index();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado', ['activo', 'cancelado', 'cerrado'])->default('activo')->index();
            $table->boolean('recaida')->default(false)->index();
            $table->string('tratamiento')->index();
            $table->string('tipo_tratamiento')->index();
            $table->string('ciclos');
            $table->string('dosis_diaria');
            $table->string('dosis_total');
            $table->string('boost');
            $table->boolean('braquiterapia')->default(false)->index();
            $table->string('dosis');
            $table->string('frecuencia');
            $table->longText('instrucciones')->nullable();
            $table->longText('observaciones')->nullable();
            $table->boolean('tratamiento_cobrable')->default(true)->index();
            $table->boolean('tratamiento_pagado')->default(false)->index();
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
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

            $table->foreign('insurance_provider_id')
                  ->references('id')
                  ->on('insurance_providers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('pathology_location_id')
                  ->references('id')
                  ->on('pathology_locations')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('protocol_id')
                  ->references('id')
                  ->on('protocols')
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
        Schema::drop('patient_treatments');
    }
}
