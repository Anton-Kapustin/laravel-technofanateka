<div class="col-12 card text-white border-basic-color mb-3 bg-card-body m-0 p-0 mb-3">
    <div class="card-header bg-card-header"  style=" {{ (Route::currentRouteName() === 'news' ? ( strlen($partOfNews->title) < 160 ? 'padding-bottom:37px;' : ' ') : '')}}">
        <div class="d-flex flex-lg-row flex-column align-items-center">
            @isset($partOfNews->title)
                <div class="col-12 p-0 mp-0 {{ (Route::currentRouteName() === 'newsAdmin' ? 'col-lg-9' : '') }}">
                    <h5 class="text-justify text-center">{{ $partOfNews->title }}</h5>
                </div>
            @endisset
            {{ $slot }} <!-- Действия с новостью -->
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center p-0 pt-lg-1 pb-lg-1  " style="overflow: hidden;">

        @if (isset($partOfNews->title_image))
            @if(Route::currentRouteName() === 'HomePage')
                <img class="card-img-top img-cirle-20 " style=" object-fit: cover;" src="{{ '/res/'.$partOfNews->title_image }}">
            @else
                <img class="col-12 col-lg-8 d-none img-rounded-30 d-md-block card-img-top rounded text-center p-0" style=" {{ (Route::currentRouteName() === 'News.index' ? '  object-fit: contain; ' : ' object-fit: cover; ') }} filter: none !important;" src="{{ '/res/news/'.$partOfNews->title_image }}" alt="Card image">
                <img class="d-md-none img-rounded-30 card-img-top text-center " style=" object-fit: scale-down; filter: none !important;" src="{{ '/res/news/'.$partOfNews->title_image }}" alt="Card image">
            @endif
        @endif

    </div>
                                    
    <div class="card-body bg-card-body text-justify">
        @if (isset($partOfNews->body))
            @if((Route::currentRouteName() === 'News.index') or (Route::currentRouteName() === 'HomePage'))
                
                <p class="card-text d-none d-md-block mb-1 text-left text-md-justify font-weight-normal">
                    {{mb_strimwidth($partOfNews->body, 0, 400, "...")}}
                </p>
                <p class="card-text d-block d-md-none mb-1 text-left text-md-justify font-weight-light">
                    {{mb_strimwidth($partOfNews->body, 0, 400, "...")}}
                </p>
                <a class="nav-links" href="{{ route('News.show', $partOfNews->id) }}">
                    Подробнее
                </a>

            @elseif((Route::currentRouteName() === 'News.show') or (Route::currentRouteName() === 'newsAdmin'))
                <div class="card-body d-none d-md-block font-weight-normal text-left text-md-justify p-0" >
                    <p class="card-text ">{!! nl2br($partOfNews->body) !!}</p>
                </div>
                <div class="card-body d-block d-md-none font-weight-light text-left text-md-justify p-0" >
                    <p class="card-text">{!! $partOfNews->body !!}</p>
                </div>
            @endif
        @endif

    </div>
    <x-news.footerNewsWithAutor :partOfNews=$partOfNews />
</div>
            