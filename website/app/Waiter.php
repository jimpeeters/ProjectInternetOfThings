<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiter extends Model {

	protected $table = 'waiters';
	public $timestamps = true;

	public function planningWaiter()
	{
		return $this->hasMany('App\PlanningWaiter', 'FK_waiter_id', 'id');
	}
	
	public function areas()
	{
		return $this->hasMany('App\WaiterArea', 'FK_waiter_id', 'id');
	}

}