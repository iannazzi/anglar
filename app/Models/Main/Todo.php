<?php namespace App\Models\Main;

use App\Models\BaseMainModel;

class Todo extends BaseMainModel {


	protected $fillable = [
		'task',
		'completed'
	    ];


}