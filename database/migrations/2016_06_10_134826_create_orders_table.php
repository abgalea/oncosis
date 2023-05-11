<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned()->index();
            $table->integer('practice_id')->unsigned()->index();
            $table->date('order_date');
            $table->integer('period_month')->unsigned()->index();
            $table->integer('period_year')->unsigned()->index();
            $table->integer('quantity');
            $table->string('funcion')->nullable();
            $table->double('total');
            $table->boolean('paid')->default(false)->index();
            $table->timestamps();

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('providers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('practice_id')
                  ->references('id')
                  ->on('practices')
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
        Schema::drop('orders');
    }
}
