<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->default('students\default.png');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('CMND')->nullable();
            $table->date('birthday');
            $table->string('address');
            $table->string('type');
            $table->string('work_unit')->nullable();
            $table->integer('kuy')->default(10);
            $table->integer('weight');
            $table->integer('height');
            $table->integer('sex');
            $table->text('link_fb')->nullable();
            $table->date('admission_day')->default('2018-10-23');
            $table->integer('diligence')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
