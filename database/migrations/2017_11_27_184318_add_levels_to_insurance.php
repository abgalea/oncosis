<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelsToInsurance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_providers', function (Blueprint $table) {
            $table->double('level_0')->after('percentage')->nullable();
            $table->double('level_1')->after('level_0')->nullable();
            $table->double('level_2')->after('level_1')->nullable();
            $table->double('level_3')->after('level_2')->nullable();
            $table->double('level_4')->after('level_3')->nullable();
            $table->double('level_5')->after('level_4')->nullable();
            $table->double('level_6')->after('level_5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance_providers', function (Blueprint $table) {
            $table->dropColumn('level_0');
            $table->dropColumn('level_1');
            $table->dropColumn('level_2');
            $table->dropColumn('level_3');
            $table->dropColumn('level_4');
            $table->dropColumn('level_5');
            $table->dropColumn('level_6');
        });
    }
}
