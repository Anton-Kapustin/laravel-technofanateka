<div class="d-flex col-lg-9 mx-md-auto p-0 m-0">
    <div class="col-12 card-body bg-card-body justify-content-center boreder-0 rounded">
            @if(Route::currentRouteName() === 'newsAdmin')
                <x-admin.offer-news-header />
            @endif
        @foreach($news as $partOfNews)
            <x-news.cardWithPartOfNews :partOfNews=$partOfNews >
            @if(Route::currentRouteName() === 'newsAdmin') <!-- Действия с новостью -->
                <x-news.actionsWithNews :partOfNews=$partOfNews />
            @endif
            </x-news.cardWithPartOfNews>
        @endforeach
    </div>
</div>