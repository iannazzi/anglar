<?php namespace App\Models\Tenant;

use App\Models\BaseModel;

class Group extends BaseModel {


	protected $fillable = [
		'id',
		'group_name',
		'allow_edit_invoice_details',
		'allow_voids',
		'allow_refunds',
		'max_discount_percent',
		'edit_closed_contents',
		'edit_closed_payments',
		'edit_closed_customer',
		'allow_other_payment',
		'allow_cc_return',
		'allow_advanced_return',
		'open_close_terminal',
		'po_max_open_past_cancel',
		'po_max_received_not_invoiced',
		'active',
		'comments'
	    ];


}