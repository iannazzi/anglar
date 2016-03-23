<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class Currency extends BaseMainModel {


	protected $fillable = [
		'is_default',
		'title',
		'code',
		'symbol_left',
		'symbol_right',
		'decimal_places',
		'exchange_rate'
	    ];


}