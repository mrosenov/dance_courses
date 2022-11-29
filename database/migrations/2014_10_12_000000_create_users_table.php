<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('town');
            $table->integer('postcode');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('contactperson')->nullable();
            $table->string('contactpersonphone')->nullable();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->enum('role', ['Admin', 'Teacher', 'Student'])->default('Student');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
};
