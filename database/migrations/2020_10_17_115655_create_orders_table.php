<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('description');
            $table->float('price', 10, 2);
            $table->integer('area')->unsigned();

            $table->bigInteger('type')->unsigned();
            $table->bigInteger('structure')->unsigned();

            $table->foreign('type')->references('id')->on('order_types');
            $table->foreign('structure')->references('id')->on('order_structures');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
