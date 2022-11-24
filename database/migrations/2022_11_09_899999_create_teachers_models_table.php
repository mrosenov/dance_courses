<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->unsignedInteger('user')->index();
            $table->unsignedInteger('dance_style')->index();
            $table->text('description');
            $table->timestamps();
            $table->tinyInteger('active')->nullable();

            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dance_style')->references('id')->on('dance_styles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
