<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentPayedOnLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_logs', function (Blueprint $table) {
            //treatment_fee
            $table->double('treatment_fee')
            ->nullable()
            ->after('observaciones');

            //treatment_payed
            $table->boolean('treatment_payed')
            ->nullable()
            ->after('treatment_fee');

            //treatment_payed_at
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
        Schema::table('treatment_logs', function (Blueprint $table) {
            $table->dropColumn('treatment_fee');
            $table->dropColumn('treatment_payed');
            $table->dropColumn('treatment_payed_at');
        });
    }
}
