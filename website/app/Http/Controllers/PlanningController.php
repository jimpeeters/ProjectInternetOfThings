<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Waiter;

class PlanningController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    	$waiters = Waiter::all();

    	$data['waiters'] = $waiters;
    	return View('planning.create')->with($data);
    }

    public function show($id)
    {

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
