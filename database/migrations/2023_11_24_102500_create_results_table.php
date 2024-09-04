<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('result_id')->unsigned();
            $table->integer('correctanswer');
            $table->integer('incorrectanswer');
            $table->double('points')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('exam_id')->nullable(); // Add this line for exam_id
            $table->foreign('exam_id')->references('sub_classesses_id')->on('sub_classesses')->onDelete('cascade')->onUpdate('cascade'); // Add foreign key constraint
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
        Schema::dropIfExists('results');
    }
}
