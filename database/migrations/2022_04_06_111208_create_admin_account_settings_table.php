<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_account_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prefix');
            $table->string('suffix');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('image');
            $table->string('job_title');
            $table->string('company');
            $table->string('website');
            $table->string('blog');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('city');
            $table->string('country');
            $table->string('zip');
            $table->string('state');
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
        Schema::dropIfExists('admin_account_settings');
    }
}
