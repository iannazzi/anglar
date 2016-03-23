<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class County extends BaseMainModel {


	protected $fillable = [
		'state_id',
		'county_name',
		'nick_name',
		'tax_jurisdiction_id'
	    ];


}