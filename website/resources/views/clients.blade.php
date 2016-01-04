@extends('layouts.master')

@section('title', 'Klanten')

@section('content')

<div class="row">

{!! Form::open(array('route' => 'client.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('FK_client_status_id', 'FK_client_status_id:') !!}
			{!! Form::text('FK_client_status_id') !!}
		</li>
		<li>
			{!! Form::label('FK_table_id', 'FK_table_id:') !!}
			{!! Form::text('FK_table_id') !!}
		</li>
		<li>
			{!! Form::label('entertime', 'Entertime:') !!}
			{!! Form::text('entertime') !!}
		</li>
		<li>
			{!! Form::label('leavetime', 'Leavetime:') !!}
			{!! Form::text('leavetime') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
	
</div>

@stop


