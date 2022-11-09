<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->timestamp('semester_start');
            $table->timestamp('semester_end');
            $table->timestamps();
            $table->tinyInteger('active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('semesters');
    }
};
