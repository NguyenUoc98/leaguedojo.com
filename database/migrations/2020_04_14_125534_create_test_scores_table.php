<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_scores', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->date('test_day');
            $table->bigInteger('student_id')->unsigned();
            $table->integer('kihon')->default(0);
            $table->integer('kata')->default(0);
            $table->integer('kumite')->default(0);
            $table->integer('physical')->default(0);
            $table->integer('total')->default(0);
            $table->timestamps();

            $table->primary(['test_day', 'student_id']);

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_scores');
    }
}
