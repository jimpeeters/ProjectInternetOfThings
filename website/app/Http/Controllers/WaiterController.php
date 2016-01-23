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
    //get all waiters
    $waiters = Waiter::all();
    $data = [];
    $data['waiters'] = $waiters;
    return View('waiter.index')->with($data);
  }

  protected function validator($data)
  {
    return Validator::make($data,
        [ 'name' => 'required|min:6',
          'email' => 'required|email',
          'phone' => 'max:20' ]
      );
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
    $validator = $this->validator($request->all());
    if($validator->fails())
    {
      return redirect()->back()->withErrors($validator);
    }

    //add new waiter
    $waiter = new Waiter;

    $waiter->name = $request->input('name');
    $waiter->email = $request->input('email');
    $waiter->phone = $request->input('phone');

    $waiter->save();

    return redirect()->back()->withSuccess('ober toegevoegd');
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
    //get waiter on id or throw exception
    $waiter = Waiter::findorfail($id);
    $data = [];
    $data['waiter'] = $waiter;
    return View('waiter.edit')->with($data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $validator = $this->validator($request->all());

    if($validator->fails())
    {
      return redirect()->back()->withInput()->withErrors($validator);
    }
    //get waiter on id or throw exception
    $waiter = Waiter::findorfail($id);

      $waiter->name = $request->input('name');
      $waiter->email = $request->input('email');
      $waiter->phone = $request->input('phone');

    $waiter->save();

    return redirect()->route('ober.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //get waiter on id or throw exception
    $waiter = Waiter::findorfail($id);
    $waiter->softDelete();
    return redirect()->back()->withSuccess('ober verwijderd');
  }
  
}

?>