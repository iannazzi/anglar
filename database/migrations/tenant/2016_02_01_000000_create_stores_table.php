<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned()->index();
            $table->integer('tax_jurisdiction_id')->unsigned()->index();
            $table->integer('active');
            $table->string('name')->default('');
            $table->string('website', 30);
            $table->string('email')->default('');
            $table->string('phone', 32)->default('');
            $table->string('fax', 32)->default('');
            $table->integer('shipping_address_id')->index()->unsigned();
            $table->integer('billing_address_id')->index()->unsigned();
            $table->string('comments', 64)->default('');
            $table->timestamps();
            //$table->foreign('billing_address_id')->references('id')->on('addresses')->onDelete('cascade');
            //$table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
