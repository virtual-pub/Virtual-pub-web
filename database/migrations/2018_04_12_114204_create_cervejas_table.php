<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCervejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cervejas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',150);
            $table->smallInteger('IBU');
            $table->smallInteger('ABV');
            $table->smallInteger('SRM');
            $table->smallInteger('EBC');
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
        Schema::dropIfExists('cervejas');
    }
}
