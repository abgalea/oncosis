<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentRelatedPatientsTreatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->integer('treatment_id')
                  ->nullable()
                  ->unsigned()
                  ->after('protocol_id');

            $table->double('treatment_fee')
                  ->nullable()
                  ->after('treatment_id');

            $table->boolean('treatment_billable')
                  ->nullable()
                  ->after('treatment_fee');

            $table->boolean('treatment_payed')
                  ->nullable()
                  ->after('treatment_billable');

            $table->foreign('treatment_id')
                  ->references('id')
                  ->on('treatments')
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
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->dropForeign('patient_treatments_treatment_id_foreign');
            $table->dropColumn('treatment_id');
            $table->dropColumn('treatment_fee');
            $table->dropColumn('treatment_billable');
            $table->dropColumn('treatment_payed');
        });
    }
}
