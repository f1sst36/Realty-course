<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccessUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_users', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');

            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('accesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_users');
    }
}
