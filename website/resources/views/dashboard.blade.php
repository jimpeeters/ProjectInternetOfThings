@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')



<!-- alle tafels -->
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12 title">
		<h2>Overzicht van de tafels <span class="subtitle-overzicht"><a id="toggle-tables">( <i class="fa fa-eye"></i> Layout verbergen )</a></span></h2>
		<hr>
	</div>
	
  @if(count($clients))
    @foreach($clients as $client)
    <div class="col-md-3">
      @if(isset($client->wait_time))
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-hourglass-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tafel 1</span>
          <span class="info-box-number">Afwachtend</span>
          <span class="progress-description">
            wachttijd : {{$client->wait_time}} min <!-- time left plugin doen -->
          </span>
        </div>
      </div>
      @else
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tafel 2</span>
          <span class="info-box-number">Bediend</span>
          <span class="progress-description">
            
          </span>
        </div>
      </div>
      @endif
    </div>
    @endforeach
  @endif

<!-- als er geen tafels meer zijn -->
  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
              {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}      
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

    <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>


  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>


  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>


  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>


  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>

  <div class="col-md-3">

     <div class="info-box bg-gray empty-box">
        {!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
          <button type="submit" class="button-clean button-plus">
            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>
          </button>
          <div class="info-box-content info-box-empty">
              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!}        
          </div>
        {!! Form::close() !!}
      </div>
    
  </div>


  @section('script')

  <script>
    $( document ).ready(function() {
      
      $("#toggle-tables").click(function() {
        $(".empty-box").fadeToggle();

      });

    });
  </script>

  @stop




</div>


@stop