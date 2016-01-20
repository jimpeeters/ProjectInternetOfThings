@include('messages.success-log')
@include('messages.error-log')

@foreach($locations as $location)
	@if($location->table != null)
		<div class="col-md-1 nopadding pointer">
			<div class="filled-block-advanced wood" data-toggle="modal" data-target="#decorationModal" data-id="{{$location->id}}">
			</div>
		</div>
	@elseif($location->decoration != null)
		@if($location->decoration->name == 'buffet')

			 <div class="col-md-1 nopadding pointer">
				<div class="filled-block-advanced food" data-toggle="modal" data-target="#decorationModal" data-id="{{$location->id}}">
				</div>
			</div>

		@elseif($location->decoration->name == 'wallv')

			<div class="col-md-1 nopadding pointer">
				<div class="filled-block-advanced wall-vertical" data-toggle="modal" data-target="#decorationModal" data-id="{{$location->id}}">
				</div>
			</div>

		@elseif($location->decoration->name == 'wallh')

		<div class="col-md-1 nopadding pointer">
			<div class="filled-block-advanced wall-horizontal" data-toggle="modal" data-target="#decorationModal" data-id="{{$location->id}}">
			</div>
		</div>

		@endif
	@else

		<div class="col-md-1 nopadding pointer">
			<div class="empty-block-advanced empty-box" data-toggle="modal" data-target="#decorationModal" data-id="{{$location->id}}">
			  <button type="submit" class="button-clean">
			    <i class="fa fa-plus-circle"></i>
			  </button>	
			</div>
		</div>
	@endif
@endforeach

<!-- Modal -->
<div id="decorationModal" class="modal fade" role="dialog">
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