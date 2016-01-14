<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;

class OverviewController extends Controller {

  public function index()
  {
      return View::make('overview');
  }


}

?>