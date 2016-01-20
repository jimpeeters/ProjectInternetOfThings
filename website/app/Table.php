<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model {

	protected $table = 'tables';
	public $timestamps = true;
	protected $dates = ['deleted_at'];

	use SoftDeletes;

	public function area()
	{
		return $this->belongsTo('App\Area', 'FK_area_id');

	}

	public function location()
	{
		return $this->belongsTo('App\Location', 'FK_location_id');
	}

	public function clients()
	{
		return $this->hasMany('App\Client', 'FK_table_id');
	}

	public function client()
	{
		return $this->hasOne('App\Client', 'FK_table_id');
	}

}