<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->text('ip_address_restrictions')->nullable();

            $table->integer('max_connections');

            $table->boolean('relogin_on_browser_change');

            $table->boolean('relogin_on_ip_address_change');
            $table->boolean('restrict_to_terminal_access');

            $table->integer('timeout_minutes');



            $table->boolean('allow_edit_invoice_details');
            $table->boolean('allow_edit_closed_invoice');
            $table->boolean('allow_voids');
            $table->boolean('allow_refunds');
            $table->decimal('max_discount_percent', 20, 5);
            $table->boolean('edit_closed_contents');
            $table->boolean('edit_closed_payments');
            $table->boolean('edit_closed_customer');
            $table->boolean('allow_other_payment');
            $table->boolean('allow_cc_return');
            $table->boolean('allow_advanced_return');
            $table->boolean('open_close_terminal');
            $table->integer('po_max_open_past_cancel');
            $table->integer('po_max_received_not_invoiced');
            $table->boolean('active');
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
        Schema::drop('groups');
    }
}
