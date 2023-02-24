<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->integerIncrements('id');
            $table->string('name');
            $table->string('country');
            $table->string('town');
            $table->string('postcode');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('VATNumber');
            $table->string('logo')->nullable();
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
};
