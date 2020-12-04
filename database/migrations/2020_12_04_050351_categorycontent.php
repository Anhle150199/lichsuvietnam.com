<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categorycontent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorycontent', function (Blueprint $table) {
            $table->integer('CategoryID');
            $table->string('CategoryName', 100);
            $table->integer('CategoryNameID');

            $table->foreign('CategoryID')->references('CategoryID')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorycontent');
    }
}
