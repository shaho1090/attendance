<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_shift', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->unsignedBigInteger('shift_id');
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')
                ->references('id')->on('days')
                ->onDelete('cascade');
            $table->foreign('shift_id')
                ->references('id')->on('shifts')
                ->onDelete('cascade');
            $table->primary(['day_id','shift_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_shift');
    }
}
