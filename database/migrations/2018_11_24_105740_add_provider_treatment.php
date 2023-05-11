<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProviderTreatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->integer('provider_id')->unsigned()->index()->nullable()->after('patient_id');

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('providers')
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
            $table->dropForeignKey('provider_id');
            $table->dropColumn('provider_id');
        });
    }
}
