@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')


<!-- alle tafels -->
<div id="ground-plan" class="row" style="margin-top: 15px;">
	<div class="col-md-12 title">
		<h1>Overzicht van de tafels 

    <span class="subtitle-overzicht"><a id="toggle-tables">( <i class="fa fa-eye"></i> Layout <span id="showHide">verbergen</span> )</a></span>

    <div style="float:right;">

        <a id="toggle-dashboard" class="dashboard-simple-icon hide">
          <i class="fa fa-th-list"></i>
        </a> 
        <a id="toggle-dashboard-second" class="dashboard-advanced-icon">
          <i class="fa fa-th"></i>
        </a>
     </div>

    </h1> 

  <hr>
	</div>


  <div class="dashboard-advanced">
    <!-- als geselecteerd th -->
    @include('sub-dashboard-advanced')
  </div>

  <div class="dashboard-simple" style="display: none;">
    <!-- als geselecteerd fa-th-list  -->
    @include('sub-dashboard-simple')
  </div>

</div>

  @section('script')

  <script>

    $( document ).ready(function() {
      
      /* de lege tables weghalen  + delete buttons weghalen*/
      $( "#toggle-tables" ).click(function() {
        $( ".empty-box" ).toggleClass( "invisible" );
        $( ".delete-button" ).toggleClass( "invisible" );
        
        if($('#showHide').text() == 'verbergen')
        {
          $('#showHide').text('tonen');
        } else {
          $('#showHide').text('verbergen');
        }
      });


      /* toggelen tussen advanced en simple dashboard*/
      $( "#toggle-dashboard" ).click(function() {

        $( ".dashboard-advanced-icon" ).toggleClass( "hide" );
        $( ".dashboard-simple-icon" ).toggleClass( "hide" );

        $( ".dashboard-advanced" ).fadeToggle();
        $( ".dashboard-simple" ).fadeToggle();


      });


      $( "#toggle-dashboard-second" ).click(function() {

        $( ".dashboard-simple-icon" ).toggleClass( "hide" );
        $( ".dashboard-advanced-icon" ).toggleClass( "hide" );

        $( ".dashboard-simple" ).fadeToggle();
        $( ".dashboard-advanced" ).fadeToggle();

      });

      /* toggelen van form als je tafel toevoegt */ 
      $( ".wood" ).click(function() {
        $( ".modal-footer-decoration" ).fadeOut(1);
        $( ".modal-footer-table" ).fadeToggle();
      });

      $( ".food , .wall-horizontal, .wall-vertical" ).click(function() {
        $( ".modal-footer-table" ).fadeOut(1);
        $( ".modal-footer-decoration" ).fadeIn();
      });

      /* text underlinen van wat geselecteerd is */
      $( ".tafel" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".tafel-text" ).toggleClass( "underline" );
      });

      $( ".buffet" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".buffet-text" ).toggleClass( "underline" );
        $( "#decoration-name" ).val('buffet'); //naam decoratie in inputfield steken
      });

      $( ".wallv" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".wallv-text" ).toggleClass( "underline" );
        $( "#decoration-name" ).val('wallv'); //naam decoratie in inputfield steken
      });

      $( ".wallh" ).click(function() {
        $( ".block-text" ).removeClass( "underline" );
        $( ".wallh-text" ).toggleClass( "underline" );
        $( "#decoration-name" ).val('wallh'); //naam decoratie in inputfield steken
      });

      $( ".full-screen" ).click(function() {
        $( "#ground-plan" ).toggleClass( "full-screen" );
      });


      check();
      function check(){
        $.getJSON('/dashboard/tableStatus', function(data){
          $.each(data, function(index){
            current = data[index].id;
            table = $(".dashboard-advanced [data-table-id='" + current + "'] .wood");
            if(data[index].hasClient)
            { 
              if(data[index].waiting)
              {
                table.removeClass('green');
                table.addClass('red');
              } else
              {
                table.removeClass('red');
                table.addClass('green');
              }
            } else {
              table.removeClass('red').removeClass('green');
            }
          });
          
          
        }).done(function(){  })
          .fail(function(e){  });
        
        setTimeout(check, 10000);
      }


    });


    $('#new-piece-modal').on('show.bs.modal', function(event) {

        //input field invullen locaties
        $("#location-table, #location-decoration").val($(event.relatedTarget).data('id'));

        //locatie nummer vanboven
        $("#locationText").text('( Locatie : ' + $(event.relatedTarget).data('id') + ' )');
    });

    $('#add-client-modal').on('show.bs.modal', function(event) {

        //FK_table_id invulllen
        $("#FK_table_id").val($(event.relatedTarget).data('tableid'));

        //locatie nummer vanboven
        $("#tableNumber").text('( Tafel : ' + $(event.relatedTarget).data('tablenumber') + ' )');
    });

    $('#checkout-client-modal').on('show.bs.modal', function(e){
      tableid = $(e.relatedTarget).data('tableid');
      $('#checkout-client-modal a').attr('href', '/klanten/checkout/' + tableid);
      tablenumber = $(e.relatedTarget).data('tablenumber');
      $('#tableNumberClose').text(tablenumber);
    })


  </script>

  @stop


@stop