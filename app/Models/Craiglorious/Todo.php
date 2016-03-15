<?php namespace App\Models\Craiglorious;

use App\Models\BaseCraigloriousModel;

class Todo extends BaseCraigloriousModel {


	protected $fillable = [
		'task',
		'completed'
	    ];


}