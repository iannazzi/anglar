<?php namespace App\Models\Tenant;

use App\Models\BaseModel;

class InventoryLocationGroup extends BaseModel {


	protected $fillable = [
		'location_group_name',
		'active',
		'comments'
	    ];


}