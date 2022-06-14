<div class="card bg-card-body mb-3 border-basic-color">
    <div class="card-horizontal">
        <div class="d-flex flex-lg-row flex-column">
            <div class="d-flex flex-column col-lg-4 d-flex align-items-center justify-content-center pt-4">

                <img src="{{ asset('/res/assemblies_preview/'.$assemble->preview_image)}}" class="card-img rounded img-assemble" alt="...">
                <div class="d-flex pt-4">
                    <x-assemble.actionWithAssemble :element=$assemble />
                </div>
                
            </div>

            <ul class="list-group list-group-flush ">

                <li class="list-group-item bg-card-body pb-0">
                    <b>{{ __($modelForTranslation.'cpu') }}</b> : {{ $assemble->cpu->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'cooller') }}</b> : {{ $assemble->cooller->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'motherboard') }}</b> : {{ $assemble->motherboard->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'ram') }}</b> : {{ $assemble->ram->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'ssd') }}</b> : {{ $assemble->ssd->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'hdd') }}</b> : {{ $assemble->hdd->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'videoCard') }}</b> : {{ $assemble->video_card->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'pc_case') }}</b> : {{ $assemble->pc_case->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 pb-0">
                    <b>{{ __($modelForTranslation.'powerSupply') }}</b> : {{ $assemble->power_supply->model }}
                </li>
                <li class="list-group-item bg-card-body pt-0 ">
                    <b>{{ __($modelForTranslation.'price') }} </b> : {{ $assemble->price }} руб.
                </li>

            </ul>

        </div>

    </div>
</div>
