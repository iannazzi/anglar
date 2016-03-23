<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class Upc extends BaseMainModel {


	protected $fillable = [
		'manufacturer_id',
		'upc_code',
		'date_added',
		'style_number',
		'style_description',
		'color_code',
		'color_description',
		'size',
		'msrp',
		'cost',
		'comments'
	    ];


}