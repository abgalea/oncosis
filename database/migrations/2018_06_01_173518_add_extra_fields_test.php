<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->boolean('rc')->default(false)->after('recaida');
            $table->boolean('rp')->default(false)->after('rc');
            $table->boolean('ee')->default(false)->after('rp');
            $table->boolean('progresion')->default(false)->after('ee');
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
            $table->dropColumn('rc');
            $table->dropColumn('rp');
            $table->dropColumn('ee');
            $table->dropColumn('progresion');
        });
    }
}
