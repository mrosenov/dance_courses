<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('semester')->index();
            $table->unsignedInteger('studio')->index();
            $table->unsignedInteger('dance_style')->index();
            $table->unsignedInteger('teacher')->index();
            $table->unsignedInteger('age_group')->index();
            $table->tinyInteger('level');
            $table->integer('free_places');
            $table->time('course_start');
            $table->time('course_end');
            $table->timestamp('course_register_start')->nullable();
            $table->timestamp('course_register_end')->nullable();
            $table->timestamps();
            $table->float('price');
            $table->enum('weekday', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])->default('Monday');
            $table->tinyInteger('active')->nullable();

            $table->foreign('semester')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('studio')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('dance_style')->references('id')->on('dance_styles')->onDelete('cascade');
            $table->foreign('teacher')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('age_group')->references('id')->on('age_groups')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
