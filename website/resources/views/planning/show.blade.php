@extends('layouts.master')

@section('title')
	planning {{ $planning->first_day }} - {{ $planning->last_day }}
@stop

@section('content')
	<h1>Planning {{ $planning->first_day }} - {{ $planning->last_day }}</h1>
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
						<td data-waiter-id="{{ $waiter->id }}" 
							data-waiter-name="{{ $waiter->name }}" 
							data-date="{{ date('Y-m-d', strtotime($planning->first_day . ' + '.$i. ' days' )) }}" 
							data-edit={{ (isset($waiter->planning[$i])) ? 'true data-start=' . $waiter->planning[$i]->start_hour . ' data-end=' . $waiter->planning[$i]->end_hour . ' data-planning-waiter-id=' . $waiter->planning[$i]->id  : 'false'}}>
							@if(isset($waiter->planning[$i]))
								{{ substr($waiter->planning[$i]->start_hour, 0, 5) . ' - ' . substr($waiter->planning[$i]->end_hour,0,5) }}
							@endif
						</td>
					@endfor
				</tr>
			@endforeach
		</tbody>
	</table>

	<a href="{{ route('planning.mail', ['id' => $planning->id]) }}" class="btn btn-primary">mail sturen</a>
	<div class="modal fade" id="planningModal" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body">
		      {!! Form::open(['route' => 'planning.add', 'id' => 'addToPlanning']) !!}

	      		{!! Form::hidden('planning', $planning->id, ['class' => 'form-control']) !!}

				{!! Form::hidden('id') !!}
				<div class="form-group">
		      		{!! Form::label('name', 'naam: ') !!}
					{!! Form::text('name', '', ['class' => 'form-control', 'readonly']) !!}
		      	</div>
		      	<div class="form-group ">
		      		{!! Form::label('date', 'datum: ') !!}
		      		<div class="input-group date">
						{!! Form::text('day', null, ['class' => 'form-control', 'readonly']) !!}
						<div class="input-group-addon">
				          <i class="fa fa-calendar"></i>
				        </div>
		      		</div>
		      	</div>
		      	<div class="form-group">
			    	
			        <div class="row">
			            <div class="col-md-6">
			            	<div class="col-md-offset-2">
				            	<h4>begin tijdstip</h4>
			            	</div>
			                <div id="datetimepickerStart"></div>
			            </div>
			            <div class="col-md-6">
							<div class="col-md-offset-2">
			            		<h4>eind tijdstip</h4>
							</div>
			                <div id="datetimepickerStop"></div>
			            </div>
			        </div>
			    </div>
				{{Form::hidden('start_hour',date('H:i'))}}
				{{Form::hidden('end_hour',date('H:i'))}}
				<a href="#" class="btn btn-danger" id="delete">verwijderen</a>
		        {!! Form::submit('opslaan', ['class' => 'btn']) !!}
		        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
		      {!! Form::close() !!}
	      </div>
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
				console.log(e.target.dataset.waiterName);
				if(e.target.dataset.waiterName)
				{
					$("#addToPlanning input[name=name]").val(e.target.dataset.waiterName);
					$("#addToPlanning input[name=id]").val(e.target.dataset.waiterId);
					$("#addToPlanning input[name=day]").val(e.target.dataset.date);
				if(e.target.dataset.edit == "true")
				{
					var planningWaiterId = e.target.dataset.planningWaiterId;
					console.log(planningWaiterId);
					$("#addToPlanning").attr('action', '/ober/planning/aanpassen/' + planningWaiterId);
					$('#addToPlanning select[name=start_hour]').val(e.target.dataset.start);
					$('#addToPlanning select[name=end_hour').val(e.target.dataset.end);
					$('#datetimepickerStart').data('DateTimePicker').date(e.target.dataset.start);
					$('#datetimepickerStop').data('DateTimePicker').date(e.target.dataset.end);
					$('#addToPlanning #delete').show();
					$('#addToPlanning #delete').attr('href', '/ober/planning/verwijder/' + planningWaiterId );


				} else
				{
					$("#addToPlanning").attr('action', '/ober/planning/add');
					$('#addToPlanning select[name=start_hour]').val(11);
					$('#addToPlanning select[name=end_hour').val(23);
					$('#addToPlanning #delete').attr('href', '#' );
					$('#addToPlanning #delete').hide();
					$('#datetimepickerStart').data('DateTimePicker').date('11:00:00');
					$('#datetimepickerStop').data('DateTimePicker').date('23:00:00');



				}
				$('#planningModal').modal('show');
				}
			});

			$('#datetimepickerStart').datetimepicker({
			    inline: true,
			    locale: 'nl',
			    sideBySide: false,
			    format: 'HH:mm',
			    stepping: 15,
			    defaultDate: moment().format(),
			});
			$('#datetimepickerStop').datetimepicker({
			    inline: true,
			    locale: 'nl',
			    sideBySide: false,
			    format: 'HH:mm',
			    stepping: 15,
			    defaultDate: moment().format(),
			});
			$('#datetimepickerStart').on("dp.change", function (e) {
			    $('#datetimepickerStop').data("DateTimePicker").minDate(e.date);
			    $( "input[name='start_hour']").val(e.date.format("HH:mm"));
			});
			$('#datetimepickerStop').on("dp.change", function (e) {
			    $( "input[name='end_hour']").val(e.date.format("HH:mm"));
			});
		});

	</script>

@stop