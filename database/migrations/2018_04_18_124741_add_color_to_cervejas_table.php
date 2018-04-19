<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cervejas', function (Blueprint $table) {
            $table->smallInteger('color_id')->unsigned();

            $table->foreign('color_id')
                    ->references('id')->on('colors')
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
        Schema::table('cervejas', function (Blueprint $table) {
            //
        });
    }
}
