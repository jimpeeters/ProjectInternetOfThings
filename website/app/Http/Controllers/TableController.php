<?php namespace App\Http\Controllers;

use App\Table;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class TableController extends Controller {

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
    // dd($request->all());
    $validator = Validator::make($request->all(),
        [
        'number' => 'required|numeric|unique:tables,number',
        'area' => 'required|exists:areas,id'
        ]);

    if($validator->fails())
    {
      return redirect()->back()->withErrors($validator);
    }

    $table = new Table;

    $table->FK_location_id = $request->input('location');
    $table->number = $request->input('number');
    $table->FK_area_id = $request->input('area');

    $table->save();

    return redirect()->back()->withSuccess('tafel toegevoegd');
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
    dd('test');
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
    $table = Table::find($id);

    $table->number = '';
    $table->save();

    $table->delete();

    return redirect()->back()->withSuccess('Tafel verwijderd');
  }
  
}

?>