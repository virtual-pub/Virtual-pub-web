<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCopoToCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cervejas', function (Blueprint $table) {
            $table->smallInteger('copo_id')->unsigned();

            $table->foreign('copo_id')
                    ->references('id')->on('copos')
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
