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
            $table->string('names')->comment("user's name");
            $table->string('lastNames')->comment("user's last Name");
            $table->string('address')->comment("user's Address");
            $table->string('cedula')->unique()->comment("user's number ID Country");
            $table->string('email')->unique()->comment("user's email");
            $table->string('countryName')->comment("user's country name");
            $table->string('celular')->comment("user's phone number");
            $table->timestamp('email_verified_at')->nullable()->comment("user's date email verified");
            $table->string('password')->nullable()->comment("user's password");
            $table->rememberToken();
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
