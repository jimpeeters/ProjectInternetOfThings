@extends('layouts.master')

@section('title', 'Gebieden')

@section('content')


@include('messages.success-log')
@include('messages.error-log')

<div class="row">
	
	<div class="col-md-12 title">
		<h1>Gebieden</h1>
		<hr>
	</div>

	<div class="col-md-4">

		<div class="box">

		<div class="box-header">
			<h4>Gebied toevoegen</h4>
		</div>

			{!! Form::open(array('route' => 'area.store', 'method' => 'POST')) !!}

				<div class="form-group">
					<label for="name">Naam :</label>
					<input type="text" name="name" class="form-control" id="number" placeholder="Naam" value="{{ old('name') }}" required> 
				</div>

				<button type="submit" class="btn custom-button">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
</div>

@stop


