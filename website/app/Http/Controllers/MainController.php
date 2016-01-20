<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Area;
use App\Order;
use View;
use App\Table;
use App\Location;
use App\Decoration;

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

        $areas = [''=>'Gebieden'] + Area::orderby('name', 'ASC')->lists('name', 'id')->all(); 

        $locations = Location::with('table')->with('decoration')->get();

    	return View::make('dashboard')
    					->with('today', $today)
        				->with('clients', $clients)
                        ->with('areas', $areas)
                        ->with('locations', $locations);

    }

    public function statistics($dateString = "today")
    {
        // echo('<pre>');
        switch($dateString)
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

        $clientsHour = [];
        $time = Carbon::today('Europe/Brussels');
        // var_dump($date);
         switch($dateString)
        {
            default:
                $clientsHour = $this->dayGraph(Carbon::today(), $clients->get());
                break;
            case "week":
            // dd('week');
                $date = Carbon::today()->subWeek();
                $clientsHour = $this->longGraph($date, $clients->get());
                break;
            case "month":
            // dd('month');
                $date = Carbon::today()->submonth();
                break;
        }

        
        // dd($clientsHour);

        $data = [];
        $data['clientSum'] = $clientSum;
        $data['clientAmount'] = $clientAmount;
        $data['orders'] = $ordersCount;
        $data['shortestTime'] = $shortestTime;
        $data['longestTime'] = $longestTime;
        $data['clientsHour'] = $clientsHour;
        // echo('</pre');
        return View('statistic')->with($data);
    }

    protected function dayGraph($date, $clients)
    {
        // dd('test');
        $time = Carbon::today('Europe/Brussels');

        for($i = env('OPENING_TIME', 10); $i <= env('CLOSING_TIME', 23); $i++)
        {
            $time->hour = $i;
            // dd($time);
            $count = 0;
            foreach($clients as $client)
            {
                // var_dump($client->entertime . ' ' . $client->leavetime);
                if($client->entertime < $time && ($client->leavetime > $time || $client->leavetime == null))
                {
                    $count += $client->amount;
                }
            }
            // var_dump($i . ':' .$count);
            $clientsHour[$i] = $count;
        }

        return $clientsHour;
    }

    protected function longGraph($date, $clients)
    {
        // dd($date);
        for($i = 0; $i<7; $i++)
        {
            $count = 0;
            $workingDate = $date->addDay();

            foreach($clients as $client)
            {
                // var_dump($client->entertime . ' ' . $client->leavetime);
                if(Carbon::createFromFormat('Y-m-d H:i:s', $client->entertime)->day == $workingDate->day)
                {
                    $count += $client->amount;
                }
            }
            var_dump($workingDate->day);
            $clientsHour[$workingDate->day] = $count;
        }
        // dd();
        return $clientsHour;

    }
}
