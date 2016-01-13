<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Order;
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

    public function statistics($date = "today")
    {
        // echo('<pre>');
        switch($date)
        {
            default:
                $date = Carbon::today();
                break;
            case "week":
                $date = Carbon::today()->subWeek();
                break;
            case "month":
                $date = Carbon::today()->submonth();
                break;
        }
        $clients = Client::where('entertime', '>', $date);
        // var_dump($clients->orderby('created_at', 'desc')->first()->orders);

        // echo '<pre>';
        // $clients = Client::where('entertime', '>', Carbon::today());
        // var_dump($clients->get());
        $clientSum = $clients->count();
        $clientAmount = $clients->sum('amount');
        $orders = Order::where('starttime', '>', $date);
        $ordersCount = $orders->count('id');
        $longestTime = $shortestTime = null;
        $ordersGet = $orders->get();
        foreach( $ordersGet as $order)
        {
            // echo '<pre>';
            // var_dump($order->client->table);
            $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $order->starttime);
            $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $order->endtime);
            $wait_time = $starttime->diffInSeconds($endtime);
            // var_dump($wait_time);
            if($longestTime == null || $shortestTime == null)
            {
                $longestTime = $shortestTime = [];
                $longestTime['time'] = $shortestTime['time'] = $wait_time;
                $longestTime['table'] = $shortestTime['table'] = $order->client->table->number;

            }
            if($wait_time > $longestTime['time'])
            {
                $longestTime['time'] = $wait_time;
                $longestTime['table'] = $order->client->table->number;
                // var_dump($longestTime['table']);
            }

            if($wait_time < $shortestTime['time'])
            {
                $shortestTime['time'] = $wait_time;
                $shortestTime['table'] = $order->client->table->number;
                // var_dump($shortestTime['table']);

            }

           
        }
        // dd($orders);

        $data = [];
        $data['clientSum'] = $clientSum;
        $data['clientAmount'] = $clientAmount;
        $data['orders'] = $ordersCount;
        $data['shortestTime'] = $shortestTime;
        $data['longestTime'] = $longestTime;
        // echo('</pre');
        return View('statistic')->with($data);
    }
}
