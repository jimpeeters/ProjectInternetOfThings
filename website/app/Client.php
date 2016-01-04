<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';
	public $timestamps = true;

	public function status()
	{
		return $this->belongsTo('ClientStatus', 'FK_client_status_id');
	}

	public function table()
	{
		return $this->belongsTo('Table', 'FK_table_id');
	}

	public function orders()
	{
		return $this->hasMany('App\Order', 'FK_client_id');
	}

}