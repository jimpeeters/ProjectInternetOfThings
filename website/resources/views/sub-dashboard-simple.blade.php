
  @if(count($clientsWithTable))
    @foreach($clientsWithTable as $client)
    <div class="col-md-3">
      @if(isset($client->wait_time))
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-hourglass-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tafel {{$client->table->number}}</span>
          <span class="info-box-number">Afwachtend</span>
          <span class="progress-description">
            wachttijd : {{$client->wait_time}} min <!-- time left plugin doen -->
          </span>
        </div>
      </div>
      @else
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tafel {{$client->table->number}}</span>
          <span class="info-box-number">Bediend</span>
          <span class="progress-description">
          </span>
        </div>
      </div>
      @endif
    </div>
    @endforeach
  @endif

<!-- als er geen tafels meer zijn -->
  
    
