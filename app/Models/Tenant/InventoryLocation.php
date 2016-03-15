<?php namespace App\Models\Tenant;

use App\Models\BaseModel;
use App\Models\BaseTenantModel;

class InventoryLocation extends BaseTenantModel {


	protected $fillable = [
		'parent_location_id',
		'location_name',
		'barcode',
		'store_id',
		'location_group_id',
		'priority',
		'active',
		'comments'
	    ];


}