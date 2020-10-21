<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            //$table->string('email')->unique();
            $table->string('password');
            $table->dateTime('last_visit')->default(date('Y-m-d H:i:s', time() + 3 * 3600));
            $table->rememberToken();

            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('user_roles');

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
        Schema::dropIfExists('users');
    }
}
