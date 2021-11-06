<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('dojo_id')->references('id')->on('dojos')->onDelete('cascade');
        });

        Schema::table('tuition_policies', function (Blueprint $table) {
            $table->foreign('dojo_id')->references('id')->on('dojos')->onDelete('cascade');
        });

        Schema::table('bonus_defaults', function (Blueprint $table) {
            $table->foreign('dojo_id')->references('id')->on('dojos')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::table('tuitions', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
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
            $table->dropForeign('videos_playlist_id_foreign');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_dojo_id_foreign');
        });

        Schema::table('tuition_policies', function (Blueprint $table) {
            $table->dropForeign('tuition_policies_dojo_id_foreign');
        });

        Schema::table('bonus_defaults', function (Blueprint $table) {
            $table->dropForeign('bonus_defaults_dojo_id_foreign');
            $table->dropForeign('bonus_defaults_role_id_foreign');
        });

        Schema::table('tuitions', function (Blueprint $table) {
            $table->dropForeign('tuitions_student_id_foreign');
        });
    }
}
