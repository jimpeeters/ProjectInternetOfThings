@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')



<!-- alle tafels -->
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12 title">
		<h2>Overzicht van de tafels 

    <span class="subtitle-overzicht"><a id="toggle-tables">( <i class="fa fa-eye"></i> Layout verbergen )</a></span>

    <div style="float:right;">
        <a id="toggle-dashboard" class="dashboard-simple-icon">
          <i class="fa fa-th-list"></i>
        </a> 
        <a id="toggle-dashboard-second" class="dashboard-advanced-icon hide">
          <i class="fa fa-th"></i>
        </a>
     </div>

    </h2> 

  <hr>
	</div>

<div class="dashboard-simple">
  <!-- als geselecteerd fa-th-list  -->
  @include('sub-dashboard-simple')
</div>

<div class="dashboard-advanced" style="display: none;">
  <!-- als geselecteerd th -->
  @include('sub-dashboard-advanced')
</div>

</div>

  @section('script')

  <script>

    $( document ).ready(function() {
      
      /* de lege tables weghalen */
      $( "#toggle-tables" ).click(function() {
        $( ".empty-box" ).toggleClass( "invisible" );
      });


      /* toggelen tussen advanced en simple dashboard*/
      $( "#toggle-dashboard" ).click(function() {

        $( ".dashboard-simple-icon" ).toggleClass( "hide" );
        $( ".dashboard-advanced-icon" ).toggleClass( "hide" );

        $( ".dashboard-simple" ).fadeToggle();
        $( ".dashboard-advanced" ).fadeToggle();

      });


      $( "#toggle-dashboard-second" ).click(function() {

        $( ".dashboard-simple-icon" ).toggleClass( "hide" );
        $( ".dashboard-advanced-icon" ).toggleClass( "hide" );

        $( ".dashboard-simple" ).fadeToggle();
        $( ".dashboard-advanced" ).fadeToggle();

      });

      /* toggelen van form als je tafel toevoegt */ 
      $( ".wood" ).click(function() {
        $( ".modal-footer-table" ).fadeToggle();
      });

      $( ".food , .wall-horizontal, .wall-vertical" ).click(function() {
        $( ".modal-footer-table" ).fadeOut();
      });

      /* text underlinen van wat geselecteerd is */
      $( ".tafel" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".tafel-text" ).toggleClass( "underline" );
      });

      $( ".buffet" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".buffet-text" ).toggleClass( "underline" );
      });

      $( ".wallv" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".wallv-text" ).toggleClass( "underline" );
      });

      $( ".wallh" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".wallh-text" ).toggleClass( "underline" );
      });





    });


    $('#decorationModal').on('show.bs.modal', function(event) {
        $("#location").val($(event.relatedTarget).data('id'));
        $("#locationText").text('( Locatie : ' + $(event.relatedTarget).data('id') + ' )');
    });


  </script>

  @stop


@stop