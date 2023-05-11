<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRcRpFielsTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->boolean('rc')->default(false)->after('recaida');
            $table->boolean('rp')->default(false)->after('rc');
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
            $table->dropColumn('rc');
            $table->dropColumn('rp');
        });
    }
}
