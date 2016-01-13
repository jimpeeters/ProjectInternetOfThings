@extends('layouts.master')

@section('page-title')
	aanpassen {{ $waiter->name }}
@stop

@section('content')

<div class="row">

	<div class="col-md-4">

		<div class="box">

		<div class="box-header">
			<h4>Ober aanpassen - {{ $waiter->name }}</h4>
		</div>

			{!! Form::model($waiter, array('route' => ['ober.update', $waiter->id], 'method' => 'PUT')) !!}

				<div class="form-group">
					{!! Form::label('name', 'Naam: ') !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => "Naam", 'required']) !!}
					
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email: ') !!}
					{!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => "Email", 'required']) !!}
					
				</div>

				<button type="submit" class="btn">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
</div>

@stop