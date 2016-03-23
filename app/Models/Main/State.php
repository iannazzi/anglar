<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class State extends BaseMainModel {


	protected $fillable = [
		'default_state_tax',
		'name',
		'short_name'
	    ];


}