<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaiterArea extends Model {

	protected $table = 'waiter_area';
	public $timestamps = true;

	public function waiter()
	{
		return $this->belongsTo('Waiter', 'FK_waiter_id');
	}

	public function area()
	{
		return $this->belongsTo('Area', 'FK_area_id');
	}

}