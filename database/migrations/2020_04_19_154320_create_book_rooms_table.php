<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
            $table->string('note');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('book_rooms');
    }
}
