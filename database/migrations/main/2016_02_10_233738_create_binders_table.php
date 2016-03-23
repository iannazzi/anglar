<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('binder_name', 40);
            $table->boolean('enabled');
            $table->string('binder_path');
            $table->string('binder_folder_path');
            $table->string('binder_file_name');
            $table->string('navigation_caption', 40);
            $table->integer('button_size')->default(200);
            $table->string('default_rooms');
            $table->integer('priority');
            $table->text('Description')->nullable();
            $table->text('comments')->nullable();
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
        Schema::drop('binders');
    }
}
