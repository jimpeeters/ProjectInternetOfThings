@extends('layouts.master')

@section('title')
	aangeduide obers
@stop

@section('content')
	<h1>Aangeduide obers</h1>
	<ul>
		@foreach($waiterAreas as $waiterArea)
			<li>{{ $waiterArea->area->name . ' - ' . $waiterArea->waiter->name }} <a href="{{ route('waiterarea.edit', [$waiterArea->id]) }}">edit</a></li>
		@endforeach
	</ul>
	<a href="{{ route('waiterarea.create') }}">nieuwe ober toekennen</a>
@stop