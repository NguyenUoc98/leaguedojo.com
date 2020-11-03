<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->string('cashier');
            $table->integer('amount');
            $table->text('note')->nullable();
            $table->date('month_start');
            $table->date('month_end');
            $table->integer('excess_cash');
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
        Schema::dropIfExists('tuitions');
    }
}
