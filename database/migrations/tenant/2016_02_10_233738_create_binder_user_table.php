<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binder_user', function (Blueprint $table) {
            $table->integer('user_id')->index();
            $table->integer('binder_id')->index();
            $table->integer('custom_binder_id')->index();
            $table->enum('binder_type', array('SYSTEM','CUSTOM'));
            $table->enum('access', array('WRITE','READ'));
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
        Schema::drop('binder_user');
    }
}
