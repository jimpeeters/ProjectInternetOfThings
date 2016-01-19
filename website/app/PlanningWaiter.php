<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanningWaiter extends Model
{
    protected $table = 'planning_waiter';
	public $timestamps = false;

	public function waiter()
	{
		return $this->belongsTo('App\Waiter', 'FK_waiter_id', 'id');
	}
}
