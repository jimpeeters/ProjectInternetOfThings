<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = 'planning';
	public $timestamps = false;

	public function planningWaiter()
	{
		return $this->hasMany('App\PlanningWaiter', 'FK_pkanning_id', 'id');
	}
}
