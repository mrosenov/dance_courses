<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('semesters_holidays', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('semester')->index();
            $table->timestamp('holiday_from')->useCurrent();
            $table->timestamp('holiday_to')->useCurrent();
            $table->timestamps();

            $table->foreign('semester')->references('id')->on('semesters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('semesters_holidays');
    }
};
