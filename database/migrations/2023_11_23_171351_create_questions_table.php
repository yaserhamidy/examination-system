<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('question_id')->id()->unsigned();

            
            $table->string('question' , 512);
            $table->string('answerone' , 256);
            $table->string('answertow' , 256);
            $table->string('answerthree' , 256);
            $table->string('answerfour' , 256);
            $table->unsignedInteger('finalanswer');
            
                          
            $table->unsignedBigInteger('sub_classesses_id')->nullable();
            $table->foreign('sub_classesses_id')->references('sub_classesses_id')->on('sub_classesses')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('questions');
    }
}
