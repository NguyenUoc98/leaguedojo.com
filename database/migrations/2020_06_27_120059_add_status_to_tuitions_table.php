<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTuitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuitions', function (Blueprint $table) {
            $table->enum('status', ['FAIL', 'SUCCESS'])->default('FAIL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuitions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
