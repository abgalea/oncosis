<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_number');
            $table->date('date_of_birth');
            $table->string('insurance_id')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('occupation')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_dead')->default(0);
            $table->boolean('has_weight_warning')->default(0);
            $table->boolean('has_insurance')->default(1);

            // Antecedentes
            $table->string('antecedente_cantidad_tabaco')->nullable();
            $table->string('antecedente_tiempo_tabaco')->nullable();
            $table->string('antecedente_fumador_pasivo')->nullable();
            $table->string('antecedente_cantidad_alcohol')->nullable();
            $table->string('antecedente_tiempo_alcohol')->nullable();
            $table->longText('antecedente_drogas')->nullable();
            $table->longText('antecedente_menarca')->nullable();
            $table->longText('antecedente_menospau')->nullable();
            $table->smallInteger('antecedente_aborto')->nullable();
            $table->smallInteger('antecedente_embarazo')->nullable();
            $table->smallInteger('antecedente_parto')->nullable();
            $table->smallInteger('antecedente_lactancia')->nullable();
            $table->string('antecedente_anticonceptivos')->nullable();
            $table->string('antecedente_anticonceptivos_aplicacion')->nullable();
            $table->longText('antecedente_quirurgicos')->nullable();
            $table->longText('antecedente_familiar_oncologico')->nullable();

            // Patología
            $table->smallInteger('patologia_alergia')->nullable();
            $table->text('patologia_alergia_tipo')->nullable();
            $table->text('patologia_neurologico')->nullable();
            $table->text('patologia_osteo_articular')->nullable();
            $table->text('patologia_cardiovascular')->nullable();
            $table->text('patologia_locomotor')->nullable();
            $table->text('patologia_infectologia')->nullable();
            $table->text('patologia_endocrinologico')->nullable();
            $table->text('patologia_urologico')->nullable();
            $table->smallInteger('patologia_oncologico')->nullable();
            $table->text('patologia_oncologico_tipo')->nullable();
            $table->text('patologia_neumonologico')->nullable();
            $table->text('patologia_ginecologico')->nullable();
            $table->text('patologia_metabolico')->nullable();
            $table->text('patologia_gastrointestinal')->nullable();
            $table->text('patologia_colagenopatia')->nullable();
            $table->text('patologia_hematologico')->nullable();
            $table->longText('patologia_otros')->nullable();

            // Localización
            $table->date('fecha_diagnostico')->nullable();
            $table->date('fecha_muerte')->nullable();
            $table->date('fecha_recaida')->nullable();
            $table->date('fecha_respuesta_completa')->nullable();
            $table->string('respuesta_parcial')->nullable();
            $table->string('progresion')->nullable();
            $table->text('causa_de_muerte')->nullable();

            // Físico
            $table->string('fisico_performance')->nullable();
            $table->string('fisico_ta')->nullable();
            $table->string('fisico_temp')->nullable();
            $table->string('fisico_talla')->nullable();
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

            // Recaída
            $table->date('recaida_fecha')->nullable();
            $table->longText('recaida_sintoma')->nullable();
            $table->longText('recaida_examen_fisico')->nullable();

            // Migración
            $table->string('c_cod')->nullable()->index();

            $table->timestamps();
        });

        Schema::create('insurance_provider_patient', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned()->index();
            $table->integer('insurance_provider_id')->unsigned()->index();
            $table->primary(['patient_id', 'insurance_provider_id'], 'insurance_provider_patient_pk');

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('insurance_provider_id')
                ->references('id')
                ->on('insurance_providers')
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
        Schema::drop('insurance_provider_patient');
        Schema::drop('patients');
    }
}
