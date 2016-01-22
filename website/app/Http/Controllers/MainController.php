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
        $today = Carbon::today('Europe/Brussels');
        $now = Carbon::now('Europe/Brussels');
        $clients = Client::where('leavetime', '=', null)->get();

        $clientsWithTable = collect([]);
            foreach($clients as $client)
            {
              if($client->table != null)
              {
                $clientsWithTable->push($client);
              }
            }

        foreach($clientsWithTable as $client)
        {
            if(count($client->orders) > 0)
            {
                $order = $client->orders()
                                ->where('endtime', '=', null)
                                ->first();
                if( $order )
                {
                    $client->wait_time = $now->diffInMinutes(Carbon::createFromFormat('Y-m-d H:i:s',$order->starttime));
                }
                
            }
        }

        $areas = [''=>'Gebieden'] + Area::orderby('name', 'ASC')->lists('name', 'id')->all(); 

        $locations = Location::with('table')->with('decoration')->get();

    	return View::make('dashboard')
    					->with('today', $today)
        				->with('clientsWithTable', $clientsWithTable)
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

        //get number of booked tables
        $clientSum = $clients->count();
        //get total amount of clients
        $clientAmount = $clients->sum('amount');
        //get number of orders
        $orders = Order::where('starttime', '>', $date);
        $ordersCount = $orders->count('id');
        $longestTime = $shortestTime = null;
        $ordersGet = $orders->get();
       
        //check all orders to set longest and shortest wait time
        foreach( $ordersGet as $order)
        {
            $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $order->starttime);
            $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $order->endtime);
            $wait_time = $endtime->diffInSeconds($starttime);
            //if longesTime or shortestTime is null, set equal to first wait time
            if($longestTime == null || $shortestTime == null)
            {
                $longestTime = $shortestTime = [];
                $longestTime['time'] = $shortestTime['time'] = $wait_time;
                $longestTime['table'] = $shortestTime['table'] = $order->client->table->number;

            }
            //if wait time is longer than old longest time, change longest time
            if($wait_time > $longestTime['time'])
            {
                $longestTime['time'] = $wait_time;
                $longestTime['table'] = $order->client->table->number;
            }
            //if wait time is shorter than old shortest time, change shortest time
            if($wait_time < $shortestTime['time'])
            {
                $shortestTime['time'] = $wait_time;
                $shortestTime['table'] = $order->client->table->number;
            }

           
        }

        $clientsHour = [];
        $time = Carbon::today('Europe/Brussels');
        //make graph
        switch($dateString)
        {
            default:
                $clientsHour = $this->dayGraph(Carbon::today(), $clients->get());
                break;
            case "week":
                $date = Carbon::today('Europe/Brussels')->subWeek();
                $clientsHour = $this->longGraph($date, $clients->get(), 'week');
                break;
            case "month":
                $date = Carbon::today('Europe/Brussels')->submonth();
                $clientsHour = $this->longGraph($date, $clients->get(), 'maand');
                break;
        }

        $data = [];
        $data['clientSum']      = $clientSum;
        $data['clientAmount']   = $clientAmount;
        $data['orders']         = $ordersCount;
        $data['shortestTime']   = $shortestTime;
        $data['longestTime']    = $longestTime;
        $data['clientsHour']    = $clientsHour;
        return View('statistic')->with($data);
    }

    protected function dayGraph($date, $clients)
    {
        $time = Carbon::today('Europe/Brussels');
        //set graph points from opening time till closing time
        for($i = env('OPENING_TIME', 10); $i <= env('CLOSING_TIME', 23); $i++)
        {
            $time->hour = $i;
            $count = 0;
            foreach($clients as $client)
            {
                if($client->entertime < $time && ($client->leavetime > $time || $client->leavetime == null))
                {
                    $count += $client->amount;
                }
            }
            $clientsHour[$i] = $count;
        }

        return $clientsHour;
    }

    protected function longGraph($date, $clients, $processingLength)
    {
        // dd($date);
        switch($processingLength)
        {
            case 'maand':
                $length = 31;
                break;
            case 'week':
                $length = 7;
                break;
        }
        //set graph point for last month/last week
        for($i = 0; $i<$length; $i++)
        {
            $count = 0;
            $workingDate = $date->addDay();

            foreach($clients as $client)
            {
                if(Carbon::createFromFormat('Y-m-d H:i:s', $client->entertime)->day == $workingDate->day)
                {
                    $count += $client->amount;
                }
            }
            $clientsHour[$workingDate->day] = $count;
        }
        return $clientsHour;

    }

    public function getTableStatus()
    {
        // echo '<pre>';
        $tables = Table::all();
        foreach($tables as $table)
        {
            if(count($table->clients()->where('leavetime', null)->get()))
            {
                $table->hasClient = true;
                $client = $table->clients()->where('leavetime', null)->first();
                // var_dump($client);
                if(count($client->orders) > 0)
                {
                    $order = $client->orders()
                                    ->where('endtime', '=', null)
                                    ->first();
                    if( $order )
                    {
                        $table->waiting = true;
                    } else
                    {
                        $table->waiting = false;
                    }
                    
                }else
                {
                    $table->waiting = false;
                }
            } else
            {
                $table->hasClient = false;
            }
            // var_dump('');
        }
        return $tables->toJson();
    }
}
