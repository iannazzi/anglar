<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class CustomerPaymentMethod extends BaseMainModel {


	protected $fillable = [
		'payment_type',
		'payment_group',
		'active'
	    ];


}