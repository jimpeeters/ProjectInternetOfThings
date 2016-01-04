<?php namespace App\Http\Controllers;

use App\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Carbon\Carbon;

class ClientController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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
        'FK_client_status_id' => 'required|numeric|exists:client_statuses,id',
        'FK_table_id' => 'required|numeric|exists:tables,id'
      ]);

    if($validator->fails())
    {
      return redirect()->back()->withInput($request->all())->withErrors($validator);
    }

    $client = new Client;

    $client->FK_client_status_id = $request->input('FK_client_status_id');
    $client->FK_table_id = $request->input('FK_table_id');
    $client->enterTime = Carbon::now();

    $client->save();
    return redirect()->back()->withSuccess('klant toegevoegd');
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