@extends('layouts.master')

@section('title')
	komende planningen
@stop

@section('content')

<div class="row">
	
	<div class="col-md-12 title">
		<h1>Komende planningen</h1>
		<hr>
	</div>
	
	@foreach($planningen as $planning)
		<div class="row" style="margin-bottom:15px; margin-left:15px; margin-right:15px; float:left;">
				<a href="{{ route('planning.show', [$planning->id]) }}" class="btn btn-default	">
					{{ $planning->first_day }} tot {{ $planning->last_day }}
				</a>
		</div>
	@endforeach
</div>
@stop