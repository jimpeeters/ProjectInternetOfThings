<?php namespace App\Http\Controllers;

use App\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Carbon\Carbon;
use App\Table;


class ClientController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $tables = Table::all();
    $tableNoClients = collect([]);
    foreach($tables as $table)
    {
      if(!count($table->clients))
      {
        $tableNoClients->push($table);
      }
    }

    return view('clients')->with('tableNoClients' , $tableNoClients);
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
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(),
      [
        'tables' => 'required|numeric|not_in:0',
        'amount' => 'required|numeric'
      ]);

    if($validator->fails())
    {
      return redirect()->back()->withInput($request->all())->withErrors($validator);
    }
    //add new client
    $client = new Client;

    //afwachtend
    $client->FK_client_status_id = '1'; 

    $input = $request->all(); //alle input requesten

    //aantal klanten
    $client->amount = $input['amount'];

    //tafel uit dropdown halen
    $tables = explode(',', $input['tables']);
    $client->FK_table_id     = $tables[0];

    //entertime = nu
    $client->enterTime = Carbon::now('Europe/Brussels');

    $client->save();
    return redirect()->back()->withSuccess('Klant succesvol toegevoegd.');
  }


  public function addClients(Request $request)
  {
      $validator = Validator::make($request->all(),
      [
        'amount' => 'required|numeric'
      ]);

    if($validator->fails())
    {
      return redirect()->back()->withInput($request->all())->withErrors($validator);
    }
    //add new client
    $client = new Client;

    //afwachtend
    $client->FK_client_status_id = '1'; 

    $input = $request->all(); //alle input requesten

    //aantal klanten
    $client->amount = $input['amount'];

    //FK uit input field
    $client->FK_table_id = $input['FK_table_id'];

    //entertime = nu
    $client->enterTime = Carbon::now('Europe/Brussels');

    $client->save();
    return redirect()->back()->withSuccess('Klant succesvol toegevoegd.');
  }

  public function checkout($tableId)
  {
    $table = Table::findOrFail($tableId);

    $client = $table->clients()->where('leavetime', null)->first();
    $client->leavetime = Carbon::now();
    $client->save();

    return redirect()->back()->withSuccess('klant uitgecheckt.');
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