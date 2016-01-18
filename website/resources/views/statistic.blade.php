@extends('layouts.master')

@section('title', 'Statistic')

@section('content')

<div class="row" style="margin-top: 15px;">

	<div class="col-md-12 title">
		<h2>Algemene info</h2>
		<hr>
		<ul>
			<li><a href="{{ route('statistics') }}">vandaag</a></li>
			<li><a href="{{ route('statistics', ['statistics' => 'week']) }}">deze week</a></li>
			<li><a href="{{ route('statistics', ['statistics' => 'month']) }}">deze maand</a></li>
		</ul>
	</div>

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">tafels behandelt</span>
          <span class="info-box-number">{{ $clientSum }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">klanten behandelt</span>
          <span class="info-box-number">{{ $clientAmount }}</span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-bell-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Bestellingen</span>
          <span class="info-box-number">{{ $orders }}</span>
        </div>
      </div>
    </div>

    

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Bediende klanten</span>
          <span class="info-box-number">3</span>
        </div>
      </div>
    </div>

</div>

<div class="row">
 	<div class="col-md-6">
      <div class="small-box bg-green">
        <div class="inner">
        	<h3>{{ isset($shortestTime['time']) ? $shortestTime['time'] : '/' }}</h3>
          <p>Langste wachttijd bij tafel {{ isset($shortestTime['table']) ? $shortestTime['table'] : '/' }}</p>
        </div>
        <div class="icon">
          <i class="fa fa-clock-o"></i>
        </div>
        <a href="" class="small-box-footer">
          
        </a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ isset($longestTime['time']) ? $longestTime['time'] : '/' }}</h3>
          <p>Langste wachttijd bij tafel {{ isset($longestTime['table']) ? $longestTime['table'] : '/' }}</p>
        </div>
        <div class="icon">
          <i class="fa fa-clock-o"></i>
        </div>
        <a href="" class="small-box-footer">
          
        </a>
      </div>
    </div>
</div>
<div class="row">
  <div id="chartdiv">
    
  </div>
</div>

@stop

@section('script')
  <script src="/js/jquery.jqplot.js"></script>
  <script>
  // console.log('test');
  var clientsHour = [];
  @foreach($clientsHour as $key => $clients)
    clientsHour.push([{{$key}},{{$clients}}]);
  @endforeach
    console.log(clientsHour);
    var clientsArray = [];
    clientsArray.push(clientsHour);
    // var clientsHour = <?php print_r(json_encode($clientsHour)); ?>;7
    // console.log(clientsHour);
    $.jqplot('chartdiv',  clientsArray,{
      seriesDefaults: {
        rendererOptions: {
          smooth: true
        }
      },
      axes: {
        xaxis: {
          // min: 0,
          // max: 25,
          pad: 1.1
        },
        yaxis: {
          min: 0
        }

      },
      grid: {
        gridLineColor: '#FFF'
      },
      gridPadding: {
        // bottom: 1
      }
    });
  </script>
@stop