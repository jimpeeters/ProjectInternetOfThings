{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('FK_client_id', 'FK_client_id:') !!}
			{!! Form::text('FK_client_id') !!}
		</li>
		<li>
			{!! Form::label('starttime', 'Starttime:') !!}
			{!! Form::text('starttime') !!}
		</li>
		<li>
			{!! Form::label('endtime', 'Endtime:') !!}
			{!! Form::text('endtime') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}