<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggedInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logged_in_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->string('http_user_agent');
            $table->string('ip_address');
            $table->string('browser', 30);
            $table->dateTime('last_accessed');
            $table->string('current_page');
            $table->integer('session_time_remaining');
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
        Schema::drop('logged_in_users');
    }
}
