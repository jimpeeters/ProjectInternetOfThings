<?php

namespace App;

use App\Area;
use App\Waiter;

use Illuminate\Database\Eloquent\Model;

class WaiterArea extends Model {

	protected $table = 'waiter_area';
	public $timestamps = true;

	public function waiter()
	{
		return $this->belongsTo('App\Waiter', 'FK_waiter_id');
	}

	public function area()
	{
		return $this->belongsTo('App\Area', 'FK_area_id');
	}

}