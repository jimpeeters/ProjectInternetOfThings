{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('FK_waiter_id', 'FK_waiter_id:') !!}
			{!! Form::text('FK_waiter_id') !!}
		</li>
		<li>
			{!! Form::label('FK_area_id', 'FK_area_id:') !!}
			{!! Form::text('FK_area_id') !!}
		</li>
		<li>
			{!! Form::label('start_time', 'Start_time:') !!}
			{!! Form::text('start_time') !!}
		</li>
		<li>
			{!! Form::label('end_time', 'End_time:') !!}
			{!! Form::text('end_time') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}