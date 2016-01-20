<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanningWaiter extends Model
{
	use SoftDeletes;
    protected $table = 'planning_waiter';
	public $timestamps = false;
	protected $SoftDelete = true;

	protected $dates = ['deleted_at'];

	public function waiter()
	{
		return $this->belongsTo('App\Waiter', 'FK_waiter_id', 'id');
	}

	public function planning()
	{
		return $this->hasOne('App\Planning', 'FK_planning_id', 'id');
	}
}
