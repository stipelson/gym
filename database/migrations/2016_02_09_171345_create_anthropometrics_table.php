<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnthropometricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anthropometric_measurements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('weight');
            $table->string('comment');
            $table->integer('hip');
            $table->integer('shoulders');
            $table->integer('chest');
            $table->integer('waist');
            $table->integer('height');
            $table->integer('abdomen');
            $table->integer('member_id')->unsigned();
            $table->integer('left_anthropometric_id')->unsigned();
            $table->integer('right_anthropometric_id')->unsigned();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('left_anthropometric_id')->references('id')->on('left_anthropometrics')->onDelete('cascade');
            $table->foreign('right_anthropometric_id')->references('id')->on('right_anthropometrics')->onDelete('cascade');

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
        Schema::drop('anthropometrics');
    }
}
