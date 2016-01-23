@extends('layouts.master')

@section('page-title')

@stop

@section('content')

	<h1>Komende planningen</h1>
	@foreach($planningen as $planning)
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('planning.show', [$planning->id]) }}" class="btn btn-default	">
					{{ $planning->first_day }} - {{ $planning->last_day }}
				</a>
			</div>
		</div>
	@endforeach
@stop