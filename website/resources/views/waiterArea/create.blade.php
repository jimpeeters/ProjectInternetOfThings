@extends('layouts.master')

@section('page-title')
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
				<div class="form-goup">
					<label for="start_time">begin tijdstip</label>
					{!! Form::text('start_time', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="end_time">eind tijdstip</label>
					{!! Form::text('end_time', null, ['class' => 'form-control']) !!}
				</div>
				

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
		});
	</script>
@stop