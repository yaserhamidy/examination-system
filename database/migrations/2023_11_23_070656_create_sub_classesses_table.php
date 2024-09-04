<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubClassessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_classesses', function (Blueprint $table) {
            $table->bigIncrements('sub_classesses_id');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sub_name', 64);
            $table->string('status')->nullable();
            $table->integer('timer');
            $table->integer('question_count')->nullable();
            $table->integer('total_score');
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
        Schema::dropIfExists('sub_classesses');
    }
}
