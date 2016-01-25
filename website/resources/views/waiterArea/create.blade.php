@extends('layouts.master')

@section('title')
	obers toekennen
@stop
@section('content')
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

<div class="row">
	
	@include('messages.success-log')
	@include('messages.error-log')
	
	
		
	<div class="col-md-12 title">
		<h1>Ober toekennen</h1>
		<hr>
	</div>
	
	<div class="col-md-5">
		<div class="box">
		<div class="box-header">
			<h4>Ober toekennen</h4>
		</div>
			{!! Form::open(array('route' => 'waiterarea.store', 'method' => 'POST')) !!}

				<div class="form-group">
					<label for="waiter" style="margin-bottom : 15px;">Ober</label></br>
					<select name="waiter" id="waiter" class="label-selector form-control">
						@foreach($waiters as $waiter)
							<option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group" style="margin-bottom : 15px;">
					<div class="row">
						<div class="col-md-12">
							<label>Gebieden</label>
						</div>
						@foreach($areas as $area)
						<div class="col-md-3">
							<div class="checkbox checkbox-primary">
								<label style="font-weight: normal;">
									<input id="checkbox" type="checkbox" name="area[]" value="{{ $area->id }}"> {{ $area->name }}
								</label>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				{{-- <div class="form-goup">
					<label for="start_time">begin tijdstip</label>
					{!! Form::text('start_time', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="end_time">eind tijdstip</label>
					{!! Form::text('end_time', null, ['class' => 'form-control']) !!}
				</div> --}}

				<div class="form-group" style="margin-top : 15px;">
			    	
			        <div class="row">
			            <div class="col-md-6">
				            <h4 class="col-md-offset-2">begin tijdstip</h4>
			                <div id="datetimepickerStart"></div>
			            </div>
			            <div class="col-md-6">
			            	<h4 class="col-md-offset-2">eind tijdstip</h4>
			                <div id="datetimepickerStop"></div>
			            </div>
			        </div>
			    </div>
				{{Form::hidden('start_time','11:00')}}
				{{Form::hidden('end_time','23:00')}}
				

				<button type="submit" class="btn custom-button">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
	<div class="col-md-7">
		<div class="box">
			<div class="box-header">
				<h4>Reeds ingepland</h4>
			</div>
			<div class="box-body">
		<div class="row">
		@if(count($waiterAreas) > 0)
			@foreach($workingWaiters as $workingWaiter)
			<div class="col-md-6">
				<ul class="list-group">
					<li class="list-group-item" style="font-weight: bold; font-size: 16px;">{{ $workingWaiter->name }} </li>
					@foreach($workingWaiter->workingAreas as $workingarea)
						<li class="list-group-item">
								{{$workingarea->area->name}}<br>{{substr($workingarea->start_time,11,5)}} - {{ substr($workingarea->end_time,11,5) }}
						</li>
					@endforeach
				</ul>
			</div>
			@endforeach
		@else
		<div class="col-md-12">
			<p>Er zijn nog geen obers ingepland!</p>
		</div>
		@endif
		</div>
			</div>
		</div>
		
	</div>
</div>
@stop

@section('script')
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.label-selector').select2();	

			$('#datetimepickerStart').datetimepicker({
			    inline: true,
			    locale: 'nl',
			    sideBySide: false,
			    format: 'HH:mm',
			    stepping: 15,
			    defaultDate: moment().hour(11).minute(00).format(),
			});
			$('#datetimepickerStop').datetimepicker({
			    inline: true,
			    locale: 'nl',
			    sideBySide: false,
			    format: 'HH:mm',
			    stepping: 15,
			    defaultDate: moment().hour(23).minute(00).format(),
			});
			$('#datetimepickerStart').on("dp.change", function (e) {
			    $('#datetimepickerStop').data("DateTimePicker").minDate(e.date);
			    $( "input[name='start_time']").val(e.date.format("HH:mm"));
			});
			$('#datetimepickerStop').on("dp.change", function (e) {
			    $( "input[name='end_time']").val(e.date.format("HH:mm"));
			});
		});
	</script>
@stop