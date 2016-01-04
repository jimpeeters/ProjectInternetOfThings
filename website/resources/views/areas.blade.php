@extends('layouts.master')

@section('title', 'Gebieden')

@section('content')


<div class="row">


{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('naam', 'Naam:') !!}
			{!! Form::text('naam') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}

</div>

@stop


