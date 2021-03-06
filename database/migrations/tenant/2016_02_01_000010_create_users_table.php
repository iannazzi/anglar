<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->index();
            $table->integer('employee_id');
            $table->string('first_name', 24)->default('');
            $table->string('last_name', 36)->default('');
            $table->boolean('active')->default(0);
            $table->string('username', 24)->default('');
            $table->string('password', 64)->default('');
            $table->string('email', 64)->default('');
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
        Schema::drop('users');
    }
}
