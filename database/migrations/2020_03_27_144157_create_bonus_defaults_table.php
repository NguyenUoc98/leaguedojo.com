<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_defaults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month_count')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->text('kuy');
            $table->integer('level');
            $table->bigInteger('dojo_id');
            $table->boolean('first')->default(0);
            $table->integer('percent');
            $table->integer('max_price')->nullable();
            $table->string('note');
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
        Schema::dropIfExists('bonus_defaults');
    }
}
