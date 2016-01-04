@extends('layouts.master')

@section('title', 'Obers')

@section('content')

<div class="row">

{!! Form::open(array('route' => 'waiter.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Naam:') !!}
			{!! Form::text('name') !!}
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
