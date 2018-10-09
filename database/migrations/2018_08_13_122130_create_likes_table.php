<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->Integer('post_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->boolean('like');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict');
            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
