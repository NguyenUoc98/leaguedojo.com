<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dojo_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('cmnd')->nullable();
            $table->date('birthday');
            $table->string('address');
            $table->string('work_unit')->nullable();
            $table->string('type');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('sex');
            $table->text('link_fb')->nullable();
            $table->enum('confirmed', ['WAIT', 'CONFIRMED', 'REJECTED'])->default('WAIT');
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
        Schema::dropIfExists('workout_registrations');
    }
}
