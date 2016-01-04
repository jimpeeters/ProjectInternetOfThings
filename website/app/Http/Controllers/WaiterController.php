<?php namespace App\Http\Controllers;

use App\Waiter;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class WaiterController extends Controller {

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
    return View('waiter.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(),
        [ 'name' => 'required|min:6',
          'email' => 'required|email' ]
      );
    if($validator->fails())
    {
      return redirect()->back()->withErrors($validator);
    }
    

    $waiter = new Waiter;

    $waiter->name = $request->input('name');
    $waiter->email = $request->input('email');

    $waiter->save();
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
    $waiter = Waiter::findorfail($id);
    $waiter->softDelete();
  }
  
}

?>