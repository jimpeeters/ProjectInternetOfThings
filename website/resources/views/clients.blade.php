@extends('layouts.master')

@section('title', 'Klanten')

@section('content')

<div class="row">

	@include('messages.success-log')
	@include('messages.error-log')
	
	<div class="col-md-12 title">
		<h1>Klanten</h1>
		<hr>
	</div>
	

	<div class="col-md-4">

		<div class="box">

		<div class="box-header">
			<h4>Klant toevoegen</h4>
		</div>

		@if(count($tableNoClients) > 0)

			{!! Form::open(array('route' => 'klanten.store', 'method' => 'POST')) !!}
				<div class="form-group">
					<input type="text" name="amount" class="form-control" id="amount" placeholder="Aantal klanten" value="{{ old('amount') }}" required> 
				</div>

				<select class="form-group form-control" id="tables" name="tables">
					<option value="" selected="selected">Tafels</option>
					@foreach($tableNoClients as $table)
						<option value="{{$table->id}}">Tafel : {{$table->number}}</option>
					@endforeach
				</select>

				<button type="submit" class="btn custom-button">Toevoegen</button>

			{!! Form::close() !!}

		@else

		 	<p style="margin-top:15px; padding-left:15px;">Er zijn geen tafels meer zonder klanten!</p>

		@endif

		</div>

	</div>	
</div>

@section('script')

<script>
      $(function () {

        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

       });
</script>

@stop


@stop


