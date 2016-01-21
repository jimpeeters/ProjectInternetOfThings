@include('messages.success-log')
@include('messages.error-log')

@foreach($locations as $location)
	@if($location->table != null)
		<div class="col-md-1 nopadding pointer">
			<a class="delete-button" href="/table/delete/{{$location->table->id}}"><i class="fa fa-times"></i></a>
			@if(count($location->table->clients) > 0)
				<div class="filled-block-advanced table-block-advanced wood">
			@else
				<div class="filled-block-advanced table-block-advanced wood" data-tableid="{{$location->table->id}}" data-toggle="modal" data-target="#add-client-modal" data-tablenumber="{{$location->table->number}}">
			@endif
			</div>
		</div>
	@elseif($location->decoration != null)
		@if($location->decoration->name == 'buffet')

			 <div class="col-md-1 nopadding pointer">
			 	<a class="delete-button" href="/decoration/delete/{{$location->decoration->id}}"><i class="fa fa-times"></i></a>
				<div class="filled-block-advanced food">
				</div>
			</div>

		@elseif($location->decoration->name == 'wallv')

			<div class="col-md-1 nopadding pointer">
				<a class="delete-button" href="/decoration/delete/{{$location->decoration->id}}"><i class="fa fa-times"></i></a>
				<div class="filled-block-advanced wall-vertical">
				</div>
			</div>

		@elseif($location->decoration->name == 'wallh')

		<div class="col-md-1 nopadding pointer">
			<a class="delete-button" href="/decoration/delete/{{$location->decoration->id}}"><i class="fa fa-times"></i></a>
			<div class="filled-block-advanced wall-horizontal">
			</div>
		</div>

		@endif
	@else

		<div class="col-md-1 nopadding pointer">
			<div class="empty-block-advanced empty-box" data-toggle="modal" data-target="#new-piece-modal" data-id="{{$location->id}}">
			  <button type="submit" class="button-clean">
			    <i class="fa fa-plus-circle"></i>
			  </button>	
			</div>
		</div>
	@endif
@endforeach

<!-- Modal  Nieuw stuk toevoegen -->
<div id="new-piece-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kies je stuk <span id="locationText"></span></h4>
      </div>
      <div class="modal-body">

        <div class="row choiseWindow">
        	<div class="col-md-3 pointer tafel">
        		<p class="block-text tafel-text">Tafel</p>
				<div class="choise-block wood">
				</div>
			</div>
			<div class="col-md-3 pointer buffet">
				<p class="block-text buffet-text">Buffet</p>
				<div class="choise-block food">
				</div>
			</div>
			<div class="col-md-3 pointer wallv">
				<p class="block-text wallv-text">Muur v</p>
				<div class="choise-block wall-vertical">
				</div>
			</div>
			<div class="col-md-3 pointer wallh">
				<p class="block-text wallh-text">Muur h</p>
				<div class="choise-block wall-horizontal">
				</div>
			</div>
        </div>

        <div class="modal-footer-table" style="display:none;">
        	{!! Form::open(array('route' => 'table.store', 'method' => 'POST')) !!}
	          <div style="margin-top: 15px;">
	              <input type="text" name="number" class="form-control" id="number" placeholder="Nummer" value="{{ old('number') }}" required> 
	               {!! Form::select('area',$areas,null,array('class' => 'form-group form-control','id' => 'area')) !!} 
	              <input id="location-table" name="location" type="hidden"></input>       
	          </div>
	          <button type="submit" class="btn custom-button">Toevoegen</button>
        	{!! Form::close() !!}
        </div>

        <div class="modal-footer-decoration" style="display:none;">
        	{!! Form::open(array('route' => 'decoration.store', 'method' => 'POST')) !!}
	          <div style="margin-top: 15px;">
	          	  <input id="decoration-name" name="name" type="hidden"></input>   
	              <input id="location-decoration" name="location" type="hidden"></input>       
	          </div>
	          <button type="submit" class="btn custom-button">Toevoegen</button>
        	{!! Form::close() !!}
        </div>

      </div>
    </div>

  </div>
</div>


<!-- Modal client toevoegen aan tafel -->
<div id="add-client-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Klant toevoegen <span id="tableNumber"></span></h4>
      </div>
      <div class="modal-body">

			{!! Form::open(array('route' => 'addClients', 'method' => 'POST')) !!}
				<div class="form-group">
					<input type="text" name="amount" class="form-control" id="amount" placeholder="Aantal klanten" value="{{ old('amount') }}" required> 
				</div>

				<input id="FK_table_id" name="FK_table_id" type="hidden"></input>    

				<button type="submit" class="btn custom-button">Toevoegen</button>

			{!! Form::close() !!}

      </div>
    </div>

  </div>
</div>