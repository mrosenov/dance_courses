<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->text('content');
            $table->unsignedInteger('category')->index();
            $table->unsignedInteger('author')->index();
            $table->timestamps();
            $table->tinyInteger('active')->nullable();

            $table->foreign('category')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
