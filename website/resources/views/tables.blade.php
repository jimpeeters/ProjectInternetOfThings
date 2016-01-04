{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('number', 'Number:') !!}
			{!! Form::text('number') !!}
		</li>
		<li>
			{!! Form::label('FK_area_id', 'FK_area_id:') !!}
			{!! Form::text('FK_area_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}