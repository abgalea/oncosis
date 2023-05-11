<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentsRelatedConsultation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_consultations', function (Blueprint $table) {
            $table->integer('treatment_id')
                  ->nullable()
                  ->unsigned()
                  ->after('recaida');

            $table->double('treatment_fee')
                  ->nullable()
                  ->after('treatment_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_consultations', function (Blueprint $table) {
            $table->dropForeign('patient_consultations_treatment_id_foreign');
            $table->dropColumn('treatment_id');
            $table->dropColumn('treatment_fee');
        });
    }
}
