<?php namespace App\Models\Tenant;

use App\Models\BaseTenantModel;
use App\Models\Main\ChartOfAccountsRequired;
use App\Models\Main\ChartOfAccountType;

class ChartOfAccount extends BaseTenantModel {


	protected $fillable = [
		'number',
		'name',
		'type',
		'sub_type',
		'active',
		'comments'
	    ];


}