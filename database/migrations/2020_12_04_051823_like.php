<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Like extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->integer('UserID');
            $table->integer('PostID');

            $table->foreign('PostID')->references('PostID')->on('post');
            
            $table->foreign('UserID')->references('UserID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like');
    }
}
