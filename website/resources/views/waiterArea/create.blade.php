@extends('layouts.master')

@section('title')
	obers toekennen
@stop
@section('content')
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

<div class="row">
	<div class="col-md-4">
		<div class="box">
		<div class="box-header">
			<h4>Ober toekennen</h4>
		</div>
			{!! Form::open(array('route' => 'waiterarea.store', 'method' => 'POST')) !!}

				<div class="form-group">
					<label for="waiter">ober selecteren</label></br>
					<select name="waiter" id="waiter" class="label-selector form-control">
						@foreach($waiters as $waiter)
							<option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					gebied<br />
					@foreach($areas as $area)
						<label><input type="checkbox" name="area[]" value="{{ $area->id }}"> {{ $area->name }}</label><br />
					@endforeach
				</div>
				{{-- <div class="form-goup">
					<label for="start_time">begin tijdstip</label>
					{!! Form::text('start_time', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="end_time">eind tijdstip</label>
					{!! Form::text('end_time', null, ['class' => 'form-control']) !!}
				</div> --}}

				<div class="form-group">
			    	
			        <div class="row">
			            <div class="col-md-6">
			            	<div class="col-md-offset-2">
				            	<h4>begin tijdstip</h4>
			            	</div>
			                <div id="datetimepickerStart"></div>
			            </div>
			            <div class="col-md-6">
							<div class="col-md-offset-2">
			            		<h4>eind tijdstip</h4>
							</div>
			                <div id="datetimepickerStop"></div>
			            </div>
			        </div>
			    </div>
				{{Form::hidden('start_time',date('H:i'))}}
				{{Form::hidden('end_time',date('H:i'))}}
				

				<button type="submit" class="btn">Toevoegen</button>

			{!! Form::close() !!}

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
			    defaultDate: moment().format(),
			});
			$('#datetimepickerStop').datetimepicker({
			    inline: true,
			    locale: 'nl',
			    sideBySide: false,
			    format: 'HH:mm',
			    stepping: 15,
			    defaultDate: moment().format(),
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