@extends('layouts.master')

@section('page-title')
	obers
@stop

@section('content')
	@foreach($waiters as $waiter)
		{{ $waiter->name }} - 
		<a href="{{ route('ober.edit', ['id' => $waiter->id]) }}">edit</a></br>
	@endforeach
@stop