<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDojoVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dojo_voucher', function (Blueprint $table) {
            $table->bigInteger('dojo_id')->unsigned()->index();
            $table->foreign('dojo_id')->references('id')->on('dojos')->onDelete('cascade');
            $table->bigInteger('voucher_id')->unsigned()->index();
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dojo_voucher');
    }
}
