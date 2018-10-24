<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_cervejas', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('cerveja_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->Integer('nota')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->foreign('cerveja_id')
                    ->references('id')->on('cervejas')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacao_cervejas', function (Blueprint $table) {
            //
        });
    }
}