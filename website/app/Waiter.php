<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiter extends Model {

	protected $table = 'waiters';
	public $timestamps = true;

	public function planningWaiter()
	{
		return $this->hasMany('App\planningWaiter', 'FK_waiter_id', 'id');
	}

}