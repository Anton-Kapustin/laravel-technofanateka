@section('form')
    <div class="card bg-form text-light mb-5">
        <div class="card-header bg-form-header">
            <h6 class="text-center">Редактирование сборки</h6>
        </div>
        <div class="card-body bg-form">
            <x-form-with-select-items :items="$array_accessories" :assemble="$array_assemble"></x-form-with-select-items>
        </div>
    </div>
