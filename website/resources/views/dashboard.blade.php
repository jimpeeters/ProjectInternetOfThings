@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')



<!-- alle tafels -->
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12 title">
		<h2>Status van de tafels</h2>
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



</div>


@stop