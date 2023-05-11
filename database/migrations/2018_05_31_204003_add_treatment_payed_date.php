<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentPayedDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->date('treatment_payed_at')
                  ->nullable()
                  ->after('treatment_payed');
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
            $table->dropColumn('treatment_payed_at');
        });
    }
}
