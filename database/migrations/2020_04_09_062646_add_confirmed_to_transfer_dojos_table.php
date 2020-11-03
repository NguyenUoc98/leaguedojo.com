<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmedToTransferDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_dojos', function (Blueprint $table) {
            $table->enum('confirmed', ['WAIT', 'CONFIRMED', 'REJECTED'])->default('WAIT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfer_dojos', function (Blueprint $table) {
            $table->dropColumn('confirmed');
        });
    }
}
