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
            $table->string('top_title')->nullable();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->string('url')->nullable();
            $table->text('file_name');
            $table->text('file_path');
            $table->timestamp('active_from')->useCurrent();
            $table->timestamp('active_to')->useCurrent();
            $table->timestamps();
            $table->tinyInteger('active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
