@extends('layouts.master')

@section('title')
	planning maken
@stop

@section('content')
{{-- <link rel="stylesheet" href=""> --}}
	<h1>Alle planningen</h1>
	<table>
		<thead>
			<th></th>
			<th>maandag</th>
			<th>dinsdag</th>
			<th>woensdag</th>
			<th>donderdag</th>
			<th>vrijdag</th>
			<th>zaterdag</th>
			<th>zondag</th>
		</thead>
		<tbody>
			@foreach($waiters as $waiter)
				<tr>
					<td>{{ $waiter->name }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop