<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_location_id');
            $table->string('location_name', 40);
            $table->string('barcode');
            $table->integer('store_id')->unsigned()->index();
            $table->integer('location_group_id')->unsigned()->index();
            $table->integer('priority');
            $table->boolean('active');
            $table->text('comments')->nullable();
            $table->unique(['parent_location_id','location_name','store_id'],'parent_location_id');
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
        Schema::drop('locations');
    }
}
