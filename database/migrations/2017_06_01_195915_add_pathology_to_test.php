<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPathologyToTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->integer('pathology_id')->after('recaida')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->dropColumn('pathology_id');
        });
    }
}
