<?php namespace App\Models\Main;

use App\Models\BaseModel;

class Binder extends BaseModel {


	protected $fillable = [
		'binder_name',
		'enabled',
		'binder_path',
		'binder_folder_path',
		'binder_file_name',
		'navigation_caption',
		'button_size',
		'default_rooms',
		'priority',
		'Description',
		'comments'
	    ];


}