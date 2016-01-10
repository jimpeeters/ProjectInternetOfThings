@extends('layouts.master')

@section('title', 'Gebieden')

@section('content')


<div class="row">
	@if (isset($errors) && count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
</div>

<div class="row">

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

				<button type="submit" class="btn">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
</div>

@stop


