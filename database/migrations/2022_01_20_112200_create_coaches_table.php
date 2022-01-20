<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->string('full_name');
            $table->string('image');
            $table->string('position')->comment('Chức vụ');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('dojo_coaches', function (Blueprint $table) {
            $table->integer('dojo_id')->index();
            $table->integer('coach_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches');
        Schema::dropIfExists('dojo_coaches');
    }
}
