<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            // Soft Delete Column
            $table->softDeletes();

            // Who deleted the item.
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeignKey('deleted_by');
            $table->dropColumn('deleted_by');
        });
    }
}
