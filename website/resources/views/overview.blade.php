@extends('layouts.master')

@section('title', 'Statistic')

@section('content')


<div class="row" style="margin-top: 15px;">

	<div class="col-md-12 title">
		<h2>Algemene info</h2>
		<hr>
	</div>

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Klanten behandelt</span>
          <span class="info-box-number">23</span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-bell-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Bestellingen</span>
          <span class="info-box-number">321</span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-hourglass-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Wachtende klanten</span>
          <span class="info-box-number">1</span>
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
          <h3>2 min 23 sec</h3>
          <p>Kortste wachttijd bij tafel 3</p>
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
          <h3>23 min 55 sec</h3>
          <p>Langste wachttijd bij tafel 1</p>
        </div>
        <div class="icon">
          <i class="fa fa-clock-o"></i>
        </div>
        <a href="" class="small-box-footer">
          
        </a>
      </div>
    </div>
</div>

@stop