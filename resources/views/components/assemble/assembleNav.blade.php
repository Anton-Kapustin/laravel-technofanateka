<div class="container border-0 rounded mx-auto bg-card-body text-light" id="myGroup">
  <div class="nav justify-content-center pt-1">
    <a class="nav-link nav-links" data-toggle="collapse" href="#collapseGame" role="button" aria-expanded="true" aria-controls="collapseGame">
        Игровые
    </a>
    <a class="nav-link nav-links" data-toggle="collapse" href="#collapseOffice" aria-expanded="false" aria-controls="collapseOffice">
        Офисные
    </a>
    @auth
    <a class="nav-link nav-links" href="{{ route('Assemble.create') }}" >
        +
    </a>
    @endauth
  </div>
  <div class="collapse show" id="collapseGame" data-parent="#myGroup">
      <div class="card border-0 bg-card-body ">
          {{ $game }}
      </div>
  </div>
  <div class="collapse " id="collapseOffice" data-parent="#myGroup">
      <div class="card border-0 bg-card-body ">
          {{ $office }}
      </div>
  </div>
</div>