<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstiloToCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cervejas', function (Blueprint $table) {
            $table->smallInteger('estilo_id')->unsigned();

            $table->foreign('estilo_id')
                    ->references('id')->on('estilos')
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
