@extends('layouts.master')

@section('title', 'Obers')

@section('content')

<div class="row">

{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('naam', 'Naam:') !!}
			{!! Form::text('naam') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}

</div>

@stop
