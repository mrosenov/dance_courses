<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->string('url')->nullable();
            $table->text('file_name');
            $table->text('file_path');
            $table->timestamp('active_from')->nullable();
            $table->timestamp('active_to')->nullable();
            $table->timestamps();
            $table->tinyInteger('active')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
