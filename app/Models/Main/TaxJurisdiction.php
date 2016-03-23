<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class TaxJurisdiction extends BaseMainModel {


	protected $fillable = [
		'state_id',
		'jurisdiction_name',
		'jurisdiction_code',
		'default_tax_rate',
		'local_or_state',
		'active'
	    ];


}