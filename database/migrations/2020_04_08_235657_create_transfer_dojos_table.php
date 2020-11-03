<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_dojos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('current_dojo_id')->unsigned();
            $table->bigInteger('new_dojo_id')->unsigned();
            $table->date('date_transfer');
            $table->string('reason');
            $table->timestamps();           
        });

        Schema::table('transfer_dojos', function($table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('current_dojo_id')->references('id')->on('dojos')->onDelete('cascade');
            $table->foreign('new_dojo_id')->references('id')->on('dojos')->onDelete('cascade');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_dojos');
    }
}
