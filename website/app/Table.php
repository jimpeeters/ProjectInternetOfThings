<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model {

	protected $table = 'tables';
	public $timestamps = true;

	public function area()
	{
		return $this->belongsTo('Area', 'FK_area_id');
	}

	public function clients()
	{
		return $this->hasMany('App\Client', 'FK_table_id');
	}

}