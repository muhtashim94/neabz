<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPlannerAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_planner_account_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('prefix');
            $table->string('img');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('job_title');
            $table->string('company');
            $table->string('website');
            $table->string('blog');
            $table->string('home_address_one');
            $table->string('home_address_two');
            $table->string('home_address_city');
            $table->string('home_address_country');
            $table->integer('home_address_zip_code');
            $table->string('home_address_state');
            $table->string('billing_address_one');
            $table->string('billing_address_two');
            $table->string('billing_address_city');
            $table->string('billing_address_country');
            $table->integer('billing_address_zip');
            $table->string('billing_address_state');
            $table->string('shipping_address_one');
            $table->string('shipping_address_two');
            $table->string('shipping_address_city');
            $table->string('shipping_address_country');
            $table->integer('shipping_address_zip');
            $table->string('shipping_address_state');
            $table->string('work_address_one');
            $table->string('work_address_two');
            $table->string('work_address_city');
            $table->string('work_address_country');
            $table->integer('work_address_zip');
            $table->string('work_address_state');
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
        Schema::dropIfExists('event_planner_account_settings');
    }
}
