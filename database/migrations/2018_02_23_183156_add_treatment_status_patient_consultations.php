<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentStatusPatientConsultations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_consultations', function (Blueprint $table) {
            $table->boolean('treatment_billable')
                  ->nullable()
                  ->after('treatment_fee');

            $table->boolean('treatment_payed')
                  ->nullable()
                  ->after('treatment_billable');
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
            $table->dropColumn('treatment_billable');
            $table->dropColumn('treatment_payed');
        });
    }
}
