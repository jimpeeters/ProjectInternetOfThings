<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	protected $table = 'areas';
	public $timestamps = true;

	public function waiter_area()
	{
		return $this->hasMany('App\WaiterArea', 'FK_area_id', 'id');
	}

}