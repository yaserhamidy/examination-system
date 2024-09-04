<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartUserTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_user_times', function (Blueprint $table) {
            $table->bigIncrements('start_user_times_id')->id()->unsigned();

            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->time('time_start_exam');

            $table->time('time_finish_exam');

            $table->string('description')->nullable();
            $table->integer('subclass')->nullable();
            
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
        Schema::dropIfExists('start_user_times');
    }
}
