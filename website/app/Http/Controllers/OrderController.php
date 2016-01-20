<?php namespace App\Http\Controllers;

use App\Order;
use App\Table;
use Carbon\Carbon;
use App\Waiter;

use Mail;

class OrderController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  public function newOrder($tableId)
  {
    // var_dump($tableId);
    // echo '<pre>';
    $table = Table::find($tableId);
    // var_dump($table);
    $client = $table->clients()->orderBy('entertime', 'DESC')->first();
    // var_dump($client);
    $order = new Order;

    $order->starttime = Carbon::now();
    $order->FK_client_id = $client->id;

    $order->save();

    $area = $table->area;
    $waiterAreas = $area->waiter_area()->where('start_time', '<', Carbon::now())->where('end_time', '>', Carbon::now())->get();
    // var_dump($waiterAreas);
    $waiters = collect([]);
    foreach($waiterAreas as $waiterArea)
    {
      $waiters->push($waiterArea->waiter);
    }
    // var_dump($waiters);
    foreach($waiters as $waiter)
    {
      // echo $waiter->email; echo '<br>';
      Mail::send('emails.waiting', ['user' => $waiter, 'table' => $table], function ($m) use ($waiter, $table) {
                    $m->from(env('MAIL_FROM'), env('MAIL_NAME'));

                    $m->to($waiter->email, $waiter->name)->subject($table->number . ' is aan het wachten');
                });
    }
    return 'created';
  }

  public function closeOrder($tableId)
  {
    echo '<pre>';
    $table = Table::find($tableId);
    $client = $table->clients()->orderBy('entertime', 'DESC')->first();
    var_dump($table);
    $lastOrder = $client->orders()->where('endtime', NULL)->get();
    foreach($lastOrder as $order)
    {
      $order->endtime = Carbon::now();
      $order->save();
    }
    
    return 'ended';

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>