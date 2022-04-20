<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_date_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id');
            $table->string('event_type')->nullable();
            $table->string('event_start');
            $table->string('start_time')->nullable();
            $table->string('event_end');
            $table->string('end_time')->nullable();
            $table->integer('display_start_time')->nullable();
            $table->integer('display_end_time')->nullable();
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
        Schema::dropIfExists('event_date_times');
    }
}
