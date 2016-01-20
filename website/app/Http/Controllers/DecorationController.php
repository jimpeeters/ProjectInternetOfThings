<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Decoration;

class DecorationController extends Controller
{
	public function store(Request $request)
	{
		$decoration = new Decoration;

	    $decoration->FK_location_id = $request->input('location');
	    $decoration->name = $request->input('name');

	    $decoration->save();

	    return redirect()->back()->withSuccess('decoratie toegevoegd');

	}

}
