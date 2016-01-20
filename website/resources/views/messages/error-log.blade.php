@if(isset($errors))
	@if ( count($errors) > 0)
	<div class="col-md-12">
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	</div>
	@endif
@endif