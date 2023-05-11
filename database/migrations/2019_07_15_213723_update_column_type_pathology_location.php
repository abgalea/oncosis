<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnTypePathologyLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE pathology_locations MODIFY numero VARCHAR(200)');

        // Schema::table('pathology_locations', function ($table) {
        //     $table->string('numero')->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE pathology_locations MODIFY numero int');
    }
}
