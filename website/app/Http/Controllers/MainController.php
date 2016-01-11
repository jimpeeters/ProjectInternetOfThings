<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use View;
use App\Tables;

use Carbon\Carbon;




class MainController extends Controller
{

    public function dashboard()
    {
    	$today  = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
    	//var_dump( $today );
    	//$clients = Client::where('entertime', '>', $today)->count();

        $clients = Client::where('leavetime', '=', null)->get();
        // dd($clients);
        foreach($clients as $client)
        {
            // dd($client->orders);
            if(count($client->orders) > 0)
            {
                $now = Carbon::now();
                $order = $client->orders()
                                ->where('endtime', '=', null)
                                ->first();
                if( $order )
                {
                    // $startTime = Carbon::createFromFormat('Y-m-d h:i:s', $order->starttime);
                    $client->wait_time = $now->diffInMinutes(Carbon::createFromFormat('Y-m-d H:i:s',$order->starttime));
                    // dd($client);
                }
                
            }
        }




    	return View::make('dashboard')
    					->with('today', $today)
        				->with('clients', $clients);


    }
}
