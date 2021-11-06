<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonRejectToBookRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_rooms', function (Blueprint $table) {
            $table->text('reason_reject')->nullable();
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
        Schema::table('book_rooms', function (Blueprint $table) {
            $table->dropColumn('reason_reject');
            $table->dropColumn('confirmed');
        });
    }
}
