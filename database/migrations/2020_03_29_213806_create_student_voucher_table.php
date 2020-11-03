<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_voucher', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('voucher_id')->unsigned()->index();
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
            
            $table->boolean('used')->default(0);
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
        Schema::dropIfExists('student_voucher');
    }
}
