<div class="card col-md-10 bg-card-body text-light p-0">
    <div class="card-header align-items-center bg-card-header m-0">
        <h6 class="text-center">{{$title}}</h6>
    </div>
    <div class="card-body m-0 p-0">
        <div id="accordion">
            @foreach ($elements as $nameElements => $array_items)
                @if($nameElements)
                    <div class="card bg-card-body">
                        <div class="card-header m-0 p-0" id="headingOne{{$nameElements}}">
                            <div class="d-flex flex-row align-items-center">
                                <h5>
                                    <a class="nav-link nav-links-active p-2" href="#" data-toggle="collapse" data-target="#collapseOne{{$nameElements}}" aria-expanded="true" aria-controls="collapseOne{{$nameElements}}">
                                        {{ __('accessories.'.$nameElements) }}
                                    </a>
                                </h5>
                                @if(Route::currentRouteName() == 'admin_accessories_page')
                                    <a class="nav-link nav-links ml-auto" href="{{ route('admin_add_'.$nameElements.'_page') }}">Добавить</a>
                                @endif
                            </div>
                        </div>
                
                        <div id="collapseOne{{$nameElements}}" class="collapse" aria-labelledby="headingOne{{$nameElements}}" data-parent="#accordion">
                            <div class="card-body">
                                @foreach ($array_items as $item)
                                    <x-accessories.one-accessory :arrayItems="$item" :acessoryName="$nameElements" :route=$route />
                                @endforeach                               
                            </div>
                        </div>
                    </div> 
                @endif
            @endforeach
        </div>
    </div>
</div>


