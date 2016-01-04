<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;



class MainController extends Controller
{
    public function dashboard()
    {
    	$today  = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
    	var_dump( $today );
    	$clients = Client::where('entertime', '>', $today)->count();
    	var_dump($clients);


    }
}
