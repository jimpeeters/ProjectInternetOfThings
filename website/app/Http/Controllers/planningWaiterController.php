<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Planning;
use App\PlanningWaiter;

use Validator;


class planningWaiterController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    protected function validator($data)
	{
	    return Validator::make($data,[ 
	    	'id' 			=> 'required|exists:waiters,id',
	    	'planning' 		=> 'required|exists:planning,id',
	    	'day' 			=> 'required|date',
	    	'start_hour' 	=> 'required|numeric|between:0,23',
	    	'end_hour' 		=> 'required|numeric|between:0,23'
	        ]
	      );
	}

    public function store(Request $request)
    {
    	$validator = $this->validator($request->all());
    	if($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator);
    	}

    	$planningWaiter = new PlanningWaiter;

    	$planningWaiter->FK_waiter_id = $request->input('id');
    	$planningWaiter->FK_planning_id = $request->input('planning');
    	$planningWaiter->day = $request->input('day');
    	$planningWaiter->start_hour = $request->input('start_hour');
    	$planningWaiter->end_hour = $request->input('end_hour');

    	$planningWaiter->save();
    	return redirect()->back();

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
    	$planningWaiter = PlanningWaiter::findOrFail($id);
    	
    	$planningWaiter->start_hour = $request->input('start_hour');
    	$planningWaiter->end_hour = $request->input('end_hour');
    	$planningWaiter->save();

    	return redirect()->back();
    	
    }

    public function destroy($id)
    {
    	$idArray = ['id' => $id];

    	$validator = Validator::make($idArray,[
    		'id' => 'required|exists:planning_waiter,id'
    		]);

    	if($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator);
    	}
    	
    	$planningWaiter = PlanningWaiter::find($id);
    	$planningWaiter->delete();

    	return redirect()->back();
    }

}
