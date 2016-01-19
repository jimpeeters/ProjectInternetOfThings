@extends('layouts.master')

@section('page-title')
	planning {{ $planning->first_day }} - {{ $planning->last_day }}
@stop

@section('content')
	<h1>planning {{ $planning->first_day }} - {{ $planning->last_day }}</h1>
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
					@for($i = 0; $i < 7; $i++)
						<td data-waiter-id="{{ $waiter->id }}" data-waiter-name="{{ $waiter->name }}" data-date="{{ date('Y-m-d', strtotime($planning->first_day . ' + '.$i. ' days' )) }}" data-edit={{ (isset($waiter->planning[$i])) ? 'true data-start=' . $waiter->planning[$i]->start_hour . ' data-end=' . $waiter->planning[$i]->end_hour : 'false' }}>
							@if(isset($waiter->planning[$i]))
								{{ $waiter->planning[$i]->start_hour . ' - ' . $waiter->planning[$i]->end_hour }}
							@endif
						</td>
					@endfor
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="modal fade" id="planningModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      {!! Form::open(['route' => 'planning.add', 'id' => 'addToPlanning']) !!}
	      <div class="modal-footer">
	      	{!! Form::hidden('planning', $planning->id) !!}
			{!! Form::hidden('id') !!}
			{!! Form::text('name') !!}</br>
			{!! Form::input('date', 'day') !!}</br>
			<select name="start_hour" id="start_hour">
				@for($i = 0; $i<24; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select></br>
			<select name="end_hour" id="end_hour">
				@for($i = 0; $i<24; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select></br>

	        <button type="button" class="btn btn-default" data-dismiss="modal">sluiten</button>
	        {!! Form::submit('opslaan', ['class' => 'btn btn-primary']) !!}
	        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
	      </div>
	      {!! Form::close() !!}
	    </div><!-- /.modal-content -->
	  </div><!--  /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('script')

	<script>
		$(document).ready(function(){

			$('table td').on('dblclick', function(e){
				console.log(e);
				$("#addToPlanning input[name=name]").val(e.target.dataset.waiterName);
				$("#addToPlanning input[name=id]").val(e.target.dataset.waiterId);
				$("#addToPlanning input[name=day]").val(e.target.dataset.date);
				if(e.target.dataset.edit == "true")
				{
					$("#addToPlanning").attr('action', '/planning/edit_waiter');
					$('#addToPlanning select[name=start_hour]').val(e.target.dataset.start);
					$('#addToPlanning select[name=end_hour').val(e.target.dataset.end);

				} else
				{
					$("#addToPlanning").attr('action', '/planning/add');
					$('#addToPlanning select[name=start_hour]').val(11);
					$('#addToPlanning select[name=end_hour').val(23);

				}
				$('#planningModal').modal('show');
			});
		});

	</script>

@stop