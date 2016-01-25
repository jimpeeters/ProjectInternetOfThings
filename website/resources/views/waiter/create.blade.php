@extends('layouts.master')

@section('title', 'Obers')

@section('content')

<div class="row">
	@include('messages.success-log')
	@include('messages.error-log')

	<div class="col-md-4">

		<div class="box">

		<div class="box-header">
			<h4>Ober toevoegen</h4>
		</div>

			{!! Form::open(array('route' => 'ober.store', 'method' => 'POST')) !!}

				<div class="form-group">
					<label for="name">Naam :</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Naam" value="{{ old('name') }}" required> 
				</div>

				<div class="form-group">
					<label for="email">Email :</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required> 
				</div>

				<div class="form-group">
					<label for="phone">Telefoon :</label>
					<input type="text" name="phone" class="form-control" id="email" placeholder="Telefoon" value="{{ old('email') }}" required> 
				</div>

				<button type="submit" class="btn custom-button">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
</div>


@stop
