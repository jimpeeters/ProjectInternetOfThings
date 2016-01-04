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


{!! Form::open(array('route' => 'area.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Naam:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}

</div>

@stop


