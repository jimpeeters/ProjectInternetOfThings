<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Waiter;
use App\Planning;
use Carbon\Carbon;

class PlanningController extends Controller
{
    public function index()
    {
        $planningen = Planning::where('last_day', '>', Carbon::today())->orderBy('first_day', 'ASC')->get();

        $data['planningen'] = $planningen;
        return View('planning.index')->with($data);    
    }

    public function create()
    {
        $waiters = Waiter::all();

        $data['waiters'] = $waiters;
        return View('planning.create')->with($data);    	
    }

    public function show($id)
    {
        // echo $planning_id;
        // try{
            $planning = Planning::findorfail($id);
            $waiters = Waiter::all();
            foreach($waiters as $waiter)
            {
                // echo 'waiter: ' . $waiter->name . '</br>';
                $planningWaiter = $waiter->planningWaiter()->where('FK_planning_id', $id);
                // var_dump($planningWaiter->get());
                // echo '<br>';
                $startDate = Carbon::createFromFormat('Y-m-d h:i:s',$planning->first_day . ' 00:00:00');

                // var_dump($startDate);
                // var_dump($startDate->addDay());
                // echo '<br>';
                $waiter->planning = collect([]);
                for($i = 0; $i < 7; $i++)
                {
                    if(count($planningWaiter->where('day', $startDate)->get()))
                    {
                        // var_dump($planningWaiter->where('day', '=', $startDate)->get());
                        // echo '</br> deze:';
                        array_add($waiter->planning, $i, $planningWaiter->where('day', $startDate)->first());
                    }
                    $startDate->addDay();
                }
                // var_dump($waiter->planning); 
            }
           
            $data['planning'] = $planning;
            $data['waiters'] = $waiters;
            return View('planning.show')->with($data);
        // }
        // catch(\Illuminate\Database\QueryException $e)
        // {
            // abort(404);
        // }
    }

    public function store($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
