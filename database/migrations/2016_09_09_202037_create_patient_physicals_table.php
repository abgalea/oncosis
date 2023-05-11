<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_physicals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('updated_by')->unsigned()->index();
            $table->date('fecha_registro')->nullable();
            $table->boolean('fisico_completo')->default(false);
            $table->boolean('recaida')->default(false);
            $table->string('fisico_peso')->nullable();
            $table->string('fisico_altura')->nullable();
            $table->string('fisico_superficie_corporal')->nullable();
            $table->string('fisico_ta')->nullable();
            $table->string('fisico_talla')->nullable();
            $table->string('fisico_temperatura')->nullable();
            $table->string('fisico_presion_arterial')->nullable();
            $table->string('fisico_cabeza')->nullable();
            $table->string('fisico_cuello')->nullable();
            $table->string('fisico_torax')->nullable();
            $table->string('fisico_abdomen')->nullable();
            $table->string('fisico_urogenital')->nullable();
            $table->string('fisico_tacto_rectal')->nullable();
            $table->string('fisico_tacto_vaginal')->nullable();
            $table->string('fisico_mama')->nullable();
            $table->string('fisico_neurologico')->nullable();
            $table->string('fisico_locomotor')->nullable();
            $table->string('fisico_linfogangliar')->nullable();
            $table->string('fisico_tcs')->nullable();
            $table->string('fisico_piel')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_physicals');
    }
}
