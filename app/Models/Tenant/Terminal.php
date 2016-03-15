<?php namespace App\Models\Tenant;

use App\Models\BaseModel;

class Terminal extends BaseModel {


	protected $fillable = [
		'store_id',
		'status',
		'mac_address',
		'ip_address',
		'cash_drawer',
		'printer_id',
		'default_cash_account_id',
		'default_check_account_id',
		'default_gift_card_account_id',
		'default_store_credit_account_id',
		'default_prepay_account_id',
		'default_non_payment_account_id',
		'payment_gateway_id',
		'refund_checking_account_id',
		'max_cash_refund',
		'location',
		'comments',
		'terminal_name',
		'terminal_description',
		'cookie_name',
		'active'
	    ];


}