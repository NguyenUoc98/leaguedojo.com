<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToTuitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuitions', function (Blueprint $table) {
            $table->boolean('type')->default(0); // 0 - offline     1 - online
            $table->string('trans_id')->nullable();
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
            $table->dropColumn('type');
            $table->dropColumn('trans_id');
        });
    }
}
