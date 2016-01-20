<p>hey {{$user->name}},</br>

bij deze de planning voor de week.</p>

<h1>planning {{ $planning->first_day }} - {{ $planning->last_day }}</h1>
<table class="footable">
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
				<th>{{ $waiter->name }}</th>
				@for($i = 0; $i < 7; $i++)
					<td data-waiter-id="{{ $waiter->id }}" data-waiter-name="{{ $waiter->name }}" data-date="{{ date('Y-m-d', strtotime($planning->first_day . ' + '.$i. ' days' )) }}" data-edit={{ (isset($waiter->planning[$i])) ? 'true data-start=' . $waiter->planning[$i]->start_hour . ' data-end=' . $waiter->planning[$i]->end_hour . ' data-planning-waiter-id=' . $waiter->planning[$i]->id  : 'false'}}>
						@if(isset($waiter->planning[$i]))
							{{ $waiter->planning[$i]->start_hour . ' - ' . $waiter->planning[$i]->end_hour }}
						@endif
					</td>
				@endfor
			</tr>
		@endforeach
	</tbody>
</table>
