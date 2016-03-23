<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class SalesTaxRate extends BaseMainModel {


	protected $fillable = [
		'sales_tax_category_id',
		'start_date',
		'end_date',
		'tax_jurisdiction_id',
		'sales_tax_name',
		'tax_rate',
		'tax_type',
		'exemption_value'
	    ];


}