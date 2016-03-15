<?php namespace App\Models\Tenant;

use App\Models\BaseModel;

class Printer extends BaseModel {


	protected $fillable = [
		'store_id',
		'account_id',
		'printer_name',
		'printer_description',
		'media',
		'location',
		'comments',
		'active'
	    ];


}