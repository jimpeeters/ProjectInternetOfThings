{!! Form::open(array('route' => 'clientstatus.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('naam', 'Naam:') !!}
			{!! Form::text('naam') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}