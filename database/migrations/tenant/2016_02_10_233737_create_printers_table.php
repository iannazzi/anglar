<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->index();
            $table->integer('account_id')->unsigned()->index();
            $table->string('printer_name', 60)->unique();
            $table->string('printer_description');
            $table->enum('media', array('Memo 5x7 Paper','Letter Paper','Avery 5167','Checks - Quicken Format'));
            $table->string('location', 60);
            $table->text('comments')->nullable();
            $table->boolean('active');
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
        Schema::drop('printers');
    }
}
