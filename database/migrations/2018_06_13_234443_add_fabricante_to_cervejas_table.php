<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFabricanteToCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cerveja', function (Blueprint $table) {
            $table->smallInteger('fabricante_id')->unsigned();

            $table->foreign('fabricante_id')
                    ->references('id')->on('users')
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
        Schema::table('cerveja', function (Blueprint $table) {
            //
        });
    }
}
