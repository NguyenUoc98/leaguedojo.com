<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attends', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->text('image')->nullable();
            $table->text('note')->nullable();
            $table->enum('confirmed', ['WAIT', 'CONFIRMED', 'REJECTED'])->default('WAIT');
            $table->timestamps();
            $table->primary(['student_id', 'event_id']);

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attends');
    }
}
