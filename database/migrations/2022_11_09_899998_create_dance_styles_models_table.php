<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('dance_styles', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->tinyInteger('active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dance_styles');
    }
};
