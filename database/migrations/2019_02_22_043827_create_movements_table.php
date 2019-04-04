<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('mov_id');
            $table->enum('mov_type', ['Entrada', 'Salida']);
            $table->dateTime('mov_datetime');
            $table->tinyInteger('mov_status');
            $table->integer('mov_peo_id')->unsigned();
            $table->foreign('mov_peo_id')
                  ->references('peo_id')
                  ->on('people')
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
        Schema::dropIfExists('movements');
    }
}
