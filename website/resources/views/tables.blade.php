@extends('layouts.master')

@section('title', 'Tafels')

@section('content')

<div class="row">

	<div class="col-md-4">

		<div class="box">

		<div class="box-header">
			<h4>Tafel toevoegen</h4>
		</div>

			{!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}

				<div class="form-group">
					<label for="number">Nummer :</label>
					<input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
				</div>
				<div class="form-group">
					<label for="FK_area_id">Gebied : </label>
					<input type="text" name="FK_area_id" class="form-control" id="area" placeholder="Nummer" value="{{ old('FK_area_id') }}" required> 
				</div>

				<button type="submit" class="btn">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	

	<div class="col-md-4">

		<div class="box">
			<div class="box-header">
				<h4>Tafel nummer <span class="badge">1</span></h4>
			</div>



		</div>
		
	</div>

</div>


@stop
