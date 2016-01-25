@extends('layouts.master')

@section('title')
	obers
@stop

@section('content')
<div class="col-md-12 title">
	<h1>Onze obers
	<div style="float:right">
		<a href="{{ route('ober.create') }}" class='h4'><i class="fa fa-plus"></i> ober toevoegen</a>
	</div>
	</h1>
	<hr>
</div>
<table class="footable">
		<thead>
			<th>naam</th>
			<th>email</th>
			<th>telefoonnummer</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($waiters as $waiter)
				<tr>
					<td>{{ $waiter->name }}</td>
					<td>{{ $waiter->email }}</td>
					<td>{{ $waiter->phone }}</td> 
					<td><a href="{{ route('ober.edit', ['id' => $waiter->id]) }}"><i class="fa fa-edit"></i></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($waiters as $waiter)
		
	@endforeach
@stop

@section('script')
	<script>
		$(document).ready(function(){
			$('.footable').footable();

		});
	</script>
@stop