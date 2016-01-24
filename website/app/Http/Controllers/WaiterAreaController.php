<?php namespace App\Http\Controllers;

use App\Waiter;
use App\WaiterArea;
use App\Area;

use Validator;
use Illuminate\Http\Request;

use Carbon\Carbon;

class WaiterAreaController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $today = Carbon::today();
    $waiterAreas = WaiterArea::where('start_time', '>', $today)->orderBy('start_time', 'ASC')->get();

    $data['waiterAreas'] = $waiterAreas;
    return View('waiterArea.index')->with($data);
  }

  protected function validator($data)
  {
    return Validator::make( $data, [
        'start_time' => 'required',
        'end_time' => 'required',
        'waiter' => 'required|exists:waiters,id',
        'area' => 'required'
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $waiters = Waiter::all();
    $areas = Area::all();
    $today = Carbon::today();
    $endDay = $today->copy()->addDay();
    $waiterAreas = WaiterArea::where('start_time', '>', $today)->where('end_time', '<', $endDay)->orderBy('FK_waiter_id')->get();

    $data = [];
    $data['waiters'] = $waiters;
    $data['areas'] = $areas;
    $data['waiterAreas'] = $waiterAreas;
    return View('waiterArea.create')->with($data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    var_dump($request->all());
    $validator = $this->validator($request->all());
    $area_not_exist = false;
    $areasDb = Area::all();

    if($validator->fails())
    {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    foreach($request->input('area') as $area)
    {
      //check if all added areas exist
      if(!$areasDb->contains($area))
      {
        $area_not_exist = true;
      }
    }
    if($area_not_exist)
    {
      //if one area doesn't exist, raise exception
      return redirect()->back()->withInput()->withErrors(['dit gebied bestaat niet']);
    }

    $start_time = Carbon::today();
    $end_time = Carbon::today();
    $start_time->hour = substr($request->input('start_time'), 0, 2);
    $start_time->minute = substr($request->input('start_time'), 3, 2);
    $end_time->hour = substr($request->input('end_time'), 0, 2);
    $end_time->minute = substr($request->input('end_time'), 3, 2);

    //add all waiterareas
    foreach($request->input('area') as $area)
    {
      $waiterArea = new WaiterArea;

      $waiterArea->FK_waiter_id = $request->input('waiter');
      $waiterArea->FK_area_id = $area;
      $waiterArea->start_time = $start_time;
      $waiterArea->end_time = $end_time;

      $waiterArea->save();
    }
    return redirect()->back()->withSucces('ober succesvol toegekend');

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
    $waiterArea = WaiterArea::findorfail($id);
    $areas = Area::all();
    
    $data['areas'] = $areas;
    $data['waiterArea'] = $waiterArea;
    return View('waiterArea.edit')->with($data);
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
      return redirect()->back()->withErrors($validator);
    }

    $start_time = Carbon::today();
    $end_time = Carbon::today();
    $start_time->hour = substr($request->input('start_time'), 0, 2);
    $start_time->minute = substr($request->input('start_time'), 3, 2);
    $end_time->hour = substr($request->input('end_time'), 0, 2);
    $end_time->minute = substr($request->input('end_time'), 3, 2);

    $waiterArea = WaiterArea::findorfail($id);

    $waiterArea->FK_area_id = $request->input('area');


    $waiterArea->start_time = $start_time;
    $waiterArea->end_time = $end_time;

    $waiterArea->save();

    return redirect()->back();


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