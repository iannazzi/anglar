<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class SalesTaxCategory extends BaseMainModel {


	protected $fillable = [
		'tax_category_name',
		'tax_exempt',
		'active'
	    ];


}