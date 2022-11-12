<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('semesters_calendar', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->unsignedInteger('semester')->index();
            $table->unsignedInteger('studio')->index();
            $table->unsignedInteger('course')->index();
            $table->enum('weekday', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])->default('Monday');
            $table->timestamps();

            $table->foreign('semester')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('studio')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('course')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('semesters_calendar');
    }
};
