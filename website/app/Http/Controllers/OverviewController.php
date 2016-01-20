<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;
use App\Decoration;
use App\Table;
use App\Location;

class OverviewController extends Controller {

  public function index()
  {

  	  

      return View::make('overview');
  }


}

?>