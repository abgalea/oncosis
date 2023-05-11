<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologyLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->index();
            $table->integer('pathology_id')->unsigned()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('updated_by')->unsigned()->index();
            $table->date('fecha_diagnostico')->nullable();
            $table->enum('tipo', ['PRIMARIO', 'METASTASIS', 'RECAIDA', 'SEGUNDO PRIMARIO'])->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('histologia')->nullable();
            $table->boolean('biopsia')->nullable();
            $table->boolean('pag')->nullable();
            $table->boolean('paf')->nullable();
            $table->string('estadio')->nullable();
            $table->string('campo_t')->nullable();
            $table->string('campo_n')->nullable();
            $table->string('campo_m')->nullable();
            $table->string('inmunohistoquimica')->nullable();
            $table->string('receptores_hormonales')->nullable();
            $table->string('estrogeno')->nullable();
            $table->longText('biologia_molecular')->nullable();
            $table->string('progesterona')->nullable();
            $table->string('indice_proliferacion')->nullable();
            $table->longText('detalles')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('pathology_id')
                  ->references('id')
                  ->on('pathologies')
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
        Schema::drop('pathology_locations');
    }
}
