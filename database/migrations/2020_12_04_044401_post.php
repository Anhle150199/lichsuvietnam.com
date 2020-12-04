<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->integer('PostID')->autoIncrement();
            $table->integer('UserID');
            $table->string('PostTitle', 100);
            $table->string('PostContent', 1000);
            $table->string('linkMedia', 100);
            $table->integer('CategoryID');
            
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
        Schema::dropIfExists('post');
    }
}
