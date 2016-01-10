@extends('layouts.master')

@section('title', 'Klanten')

@section('content')

<div class="row">

	<div class="col-md-6">

		<div class="box">

		<div class="box-header">
			<h4>Klant toevoegen</h4>
		</div>

			{!! Form::open(array('route' => 'client.store', 'method' => 'POST')) !!}

				<div class="form-group">
					status dropdown
					<!-- Form::select('status',$statuses,null,array('class' => 'form-group form-control','id' => 'status')) -->
				</div>

				<div class="form-group">
					table dropdown
					<!-- Form::select('table',$tables,null,array('class' => 'form-group form-control','id' => 'tables')) -->
				</div>


                  <!-- Date and time range -->
                  <div class="form-group">
                    <label>Aankomst en vertrek:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservationtime">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

				<button type="submit" class="btn">Toevoegen</button>

			{!! Form::close() !!}

		</div>

	</div>	
</div>

@section('script')

<script>
      $(function () {

        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

       });
</script>

@stop


@stop


