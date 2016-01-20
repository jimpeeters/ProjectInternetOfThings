<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{
   	protected $table = 'decorations';
	public $timestamps = true;

	public function location()
	{
		return $this->belongsTo('App\Location', 'FK_location_id');
	}


}
