@extends('layouts.master')

@section('title', 'statistieken')

@section('content')

<div class="row" style="margin-top: 15px;">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.min.css"></link>
	<div class="col-md-12 title">
		<h2>Statistieken</h2>
		<hr>
</div>
<div class="row" style="margin-top: 15px;">


  </div>
    <div class="col-md-3">
      <div class="input-group date">
        <input type="text" class="form-control" id="datepicker" value="{{ $date }}" data-date-format="yyyy-mm-dd">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
      </div>
    </div>
  </div>
<div class="row" style="margin-top: 15px;">

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">tafels behandelt</span>
          <span class="info-box-number">{{ $clientSum }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
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
        <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">personeelsleden</span>
          <span class="info-box-number">{{ $staff }}</span>
        </div>
      </div>
    </div>

</div>

<div class="row">
 	<div class="col-md-6">
      <div class="small-box bg-green">
        <div class="inner">
        	<h3>{{ isset($shortestTime['time']) ? $shortestTime['time'] : '/' }}</h3>
          <p>kortste wachttijd bij tafel {{ isset($shortestTime['table']) ? $shortestTime['table'] : '/' }}</p>
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
  <div class="col-md-12">
    <div id="chartdiv">
      
    </div>
  </div>
</div>

@stop

@section('script')
  <script src="/js/bootstrap-datepicker.js"></script>
  <script>
  </script>
  <script src="/js/jquery.jqplot.js"></script>
  <script>

  $('#datepicker').datepicker();
  $('#datepicker').on('change', function(){
    date = $(this).val();
    window.location = '/statistieken/' + date
  })




  //console.log('test');
  var clientsHour = [];
  @foreach($clientsHour as $key => $clients)
    clientsHour.push([{{$key}},{{$clients}}]);
  @endforeach
    //console.log(clientsHour);
    var clientsArray = [];
    clientsArray.push(clientsHour);
    // var clientsHour = <?php print_r(json_encode($clientsHour)); ?>;
    // console.log(clientsHour);
    $.jqplot('chartdiv',  clientsArray,{
      seriesDefaults: {
        rendererOptions: {
          smooth: true
        }
      },
      title: {
        text: 'klanten per uur',
        show: true
      },
      axes: {
        xaxis: {
          // min: 0,
          // max: 25,
          pad: 1.1,
          tickOptions: {
            mark: 'inside',
            suffix: ':00',
          }
        },
        yaxis: {
          min: 0
        }

      },
      grid: {
        gridLineColor: '#AAA',
        background: '#ECF0F1',
        borderWidth: 0.5,
      },
      gridDimension: {
        width: 5,
      },
      gridPadding: {
        // bottom: 1
      }
    });
  </script>
@stop