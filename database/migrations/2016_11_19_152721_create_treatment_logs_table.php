<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_treatment_id')->unsigned()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('updated_by')->unsigned()->index();
            $table->string('ciclo')->nullable();
            $table->string('toxicidad')->nullable();
            $table->string('tension_arterial')->nullable();
            $table->string('frecuencia_cardiaca')->nullable();
            $table->string('peso')->nullable();
            $table->longText('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('patient_treatment_id')
                  ->references('id')
                  ->on('patient_treatments')
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
        Schema::drop('treatment_logs');
    }
}
