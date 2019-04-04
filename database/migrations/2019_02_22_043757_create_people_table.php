<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('peo_id');
            $table->string('peo_id_number')->unique();
            $table->string('peo_first_name');
            $table->string('peo_second_name')->nullable();
            $table->string('peo_last_name');
            $table->string('peo_second_surname');
            $table->string('peo_email')->nullable();
            $table->enum('peo_gender', ['M', 'F']);
            $table->string('peo_phone_a');
            $table->string('peo_phone_b')->nullable();
            $table->enum('peo_blood_type', ['A','B','AB','O']);
            $table->enum('peo_rh', ['+','-']);
            $table->string('peo_address')->nullable();
            $table->date('peo_date_of_birth');
            $table->integer('peo_pos_id')->unsigned();
            $table->tinyInteger('peo_status')->unsigned();
            $table->foreign('peo_pos_id')
                  ->references('pos_id')
                  ->on('positions');
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
        Schema::dropIfExists('people');
    }
}
