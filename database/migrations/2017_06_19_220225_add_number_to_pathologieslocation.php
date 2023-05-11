<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumberToPathologieslocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pathology_locations', function (Blueprint $table) {
            $table->integer('numero')->after('tipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pathology_locations', function (Blueprint $table) {
            $table->dropColumn('numero');
        });
    }
}
