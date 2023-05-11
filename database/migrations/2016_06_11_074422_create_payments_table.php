<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('insurance_provider_id')->unsigned()->index();
            $table->date('payment_date');
            $table->integer('payment_month')->unsigned()->index();
            $table->integer('payment_year')->unsigned()->index();
            $table->double('total');
            $table->longText('notes')->nullable();
            $table->timestamps();

            $table->foreign('insurance_provider_id')
                  ->references('id')
                  ->on('insurance_providers')
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
        Schema::drop('payments');
    }
}
