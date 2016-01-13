<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'orders';
	public $timestamps = true;

	public function client()
	{
		return $this->belongsTo('App\Client', 'FK_client_id');
	}

	
}