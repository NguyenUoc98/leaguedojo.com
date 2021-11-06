<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagToDocumentation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->text('keywords')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('keywords')->nullable();
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->text('keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });
    }
}
