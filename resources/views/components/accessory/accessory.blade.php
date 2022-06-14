<div class="col-12 card text-white border-basic-color mb-3 p-0 m-0">
    <div class="card-header bg-card-body " >
        @foreach ($element->toArray() as $key => $item)
            <div class="d-flex flex-row ">
                @if($key != 'id')
                    <span class="col-6 p-1 text-right">{{ (Lang::has($modelForTranslation.$key) ? __($modelForTranslation.$key) : $key) }}:</span>
                    <span class="col-6 p-1 text-left"> {{$item}}</span>
                @endif
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $slot }}
        </div>

    </div>
</div>