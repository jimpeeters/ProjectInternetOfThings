<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
	public $timestamps = true;


    public function decoration(){

		return $this->hasOne('App\Decoration', 'FK_location_id');
	}

	public function table(){

		return $this->hasOne('App\Table', 'FK_location_id');
	}

}
