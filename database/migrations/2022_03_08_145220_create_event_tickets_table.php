<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
            $table->integer('event_id');
            $table->integer('available_quantity')->nullable();
            $table->integer('price')->nullable();
            $table->integer('ticket_available')->nullable();
            $table->string('sales_start_date_time')->nullable();
            $table->string('sale_end_date_time')->nullable();
            $table->string('description')->nullable();
            $table->string('visibility')->nullable();
            $table->integer('max_ticket')->nullable();
            $table->integer('min_ticket')->nullable();
            $table->string('sale_channel')->nullable();
            $table->integer('eticket')->nullable();
            $table->integer('will_call')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('event_tickets');
    }
}
