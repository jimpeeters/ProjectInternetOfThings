@extends('layouts.master')

@section('page-title')
	planning {{ $planning->first_day }} - {{ $planning->last_day }}
@stop

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/0.1.0/css/footable.css">
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
	<div class="modal fade" id="planningModal" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      {!! Form::open(['route' => 'planning.add', 'id' => 'addToPlanning']) !!}

      		{!! Form::hidden('planning', $planning->id, ['class' => 'form-control']) !!}

			{!! Form::hidden('id') !!}
			<div class="form-group">
	      		{!! Form::label('name', 'naam: ') !!}
				{!! Form::text('name') !!}</br>
	      	</div>
	      	<div class="form-group">
	      		{!! Form::label('date', 'datum: ') !!}
				{!! Form::input('date', 'day') !!}</br>
	      	</div>
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
			<a href="#" class="btn btn-danger" id="delete">verwijderen</a>
	        {!! Form::submit('opslaan', ['class' => 'btn btn-primary']) !!}
	        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
	      {!! Form::close() !!}
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">sluiten</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!--  /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/0.1.0/js/footable.js"></script>


	<script>
		$(document).ready(function(){
			$('.footable').footable();

			$('table td').on('dblclick', function(e){
				console.log(e);
				$("#addToPlanning input[name=name]").val(e.target.dataset.waiterName);
				$("#addToPlanning input[name=id]").val(e.target.dataset.waiterId);
				$("#addToPlanning input[name=day]").val(e.target.dataset.date);
				if(e.target.dataset.edit == "true")
				{
					var planningWaiterId = e.target.dataset.planningWaiterId;
					console.log(planningWaiterId);
					$("#addToPlanning").attr('action', '/planning/aanpassen/' + planningWaiterId);
					$('#addToPlanning select[name=start_hour]').val(e.target.dataset.start);
					$('#addToPlanning select[name=end_hour').val(e.target.dataset.end);
					$('#addToPlanning #delete').show();
					$('#addToPlanning #delete').attr('href', '/planning/verwijder/' + planningWaiterId );


				} else
				{
					$("#addToPlanning").attr('action', '/planning/add');
					$('#addToPlanning select[name=start_hour]').val(11);
					$('#addToPlanning select[name=end_hour').val(23);
					$('#addToPlanning #delete').attr('href', '#' );
					$('#addToPlanning #delete').hide();


				}
				$('#planningModal').modal('show');
			});
		});

	</script>

@stop