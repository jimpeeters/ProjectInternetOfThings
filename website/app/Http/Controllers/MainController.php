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
use App\WaiterArea;

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

    public function statistics($dateString = null)
    {
        // echo('<pre>');
        Carbon::setLocale('nl');

        //check if valid date
        $isRightFormat = preg_match('(^[0-9]{4}-[0-9]{2}-[0-9]{2}$)', $dateString);
        if($dateString && $isRightFormat && Carbon::createFromFormat('Y-m-d', $dateString) !== false )
        {
            $date = Carbon::createFromFormat('Y-m-d h:i:s', $dateString . ' 00:00:00', 'Europe/Brussels');
        } else
        {
            $date = Carbon::today('Europe/Brussels');
        }
        $clients = Client::where('entertime', '>', $date)->where('entertime', '<', $date->copy()->addDay());

        //get number of booked tables
        $clientSum = $clients->count();
        //get total amount of clients
        $clientAmount = $clients->sum('amount');
        //get number of orders
        $orders = Order::where('starttime', '>', $date)->where('starttime', '<', $date->copy()->addDay());
        $ordersCount = $orders->count('id');
        $longestTime = $shortestTime = null;
        $ordersGet = $orders->get();
        //get total number of staff members working today
        $staff = WaiterArea::groupBy('FK_waiter_id')->where('start_time', '>', $date)->where('end_time', '<', $date->copy()->addDay())->get()->count();
        //check all orders to set longest and shortest wait time
        foreach( $ordersGet as $order)
        {
            $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $order->starttime);
            if($order->endtime){
                $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $order->endtime);
            } else{
                $endtime = Carbon::now('Europe/Brussels');
            }
            $wait_time = $endtime->diffInSeconds($starttime);
            //if longesTime or shortestTime is null, set equal to first wait time
            if($longestTime == null || $shortestTime == null)
            {
                $longestTime = $shortestTime = [];
                $longestTime['time'] = $shortestTime['time'] = $wait_time;
                $longestTime['start'] = $shortestTime['start'] = $starttime;
                $longestTime['end'] = $shortestTime['end'] = $endtime;
                $longestTime['table'] = $shortestTime['table'] = $order->client->table->number;

            }
            //if wait time is longer than old longest time, change longest time
            if($wait_time > $longestTime['time'])
            {
                $longestTime['time'] = $wait_time;
                $longestTime['start'] = $starttime;
                $longestTime['end'] = $endtime;
                $longestTime['table'] = $order->client->table->number;
            }
            //if wait time is shorter than old shortest time, change shortest time
            if($wait_time < $shortestTime['time'])
            {
                $shortestTime['time'] = $wait_time;
                $shortestTime['start'] = $starttime;
                $shortestTime['end'] = $endtime;
                $shortestTime['table'] = $order->client->table->number;
            }
        }
        //set times readable for humans
        if(isset($longestTime) && isset($shortestTime))
        {
            $longestTime['time'] = $longestTime['end']->diffForHumans($longestTime['start'], true);
            $shortestTime['time'] = $shortestTime['end']->diffForHumans($shortestTime['start'], true);
        }

        $clientsHour = [];
        //make graph
        $clientsHour = $this->dayGraph($date, $clients->get());

        $data = [];
        $data['date']           = $date->toDateString();
        $data['clientSum']      = $clientSum;
        $data['clientAmount']   = $clientAmount;
        $data['orders']         = $ordersCount;
        $data['shortestTime']   = $shortestTime;
        $data['longestTime']    = $longestTime;
        $data['clientsHour']    = $clientsHour;
        $data['staff']          = $staff;
        return View('statistic')->with($data);
    }

    protected function dayGraph($date, $clients)
    {
        $time = $date->copy();
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
        $tables = Table::all();
        foreach($tables as $table)
        {
            //check if table has clients
            if(count($table->clients()->where('leavetime', null)->get()))
            {
                $table->hasClient = true;
                $client = $table->clients()->where('leavetime', null)->first();
                //check if client is waiting
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
        }
        return $tables->toJson();
    }
}
