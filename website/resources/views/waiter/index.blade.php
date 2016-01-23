@extends('layouts.master')

@section('page-title')
	obers
@stop

@section('content')
<table class="footable">
		<thead>
			<th>naam</th>
			<th>email</th>
			<th>telefoonnummer</th>
			<th><a href="{{ route('ober.create') }}"><i class="fa fa-plus"></i> nieuw</a></th>
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

		})
	</script>
@stop