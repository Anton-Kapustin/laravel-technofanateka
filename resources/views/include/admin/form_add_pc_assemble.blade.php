@section('form')
    <div class="card bg-form text-light mb-5">
        <div class="card-header bg-form-header">
            <h6 class="text-center">Добавление новой сборки ПК</h6>
        </div>
        <div class="card-body bg-form">
            @if ($array_accessories['form_type'] == 'assemble_add')
                <x-form-with-select-items :items="$array_accessories"></x-form-with-select-items>      
            @elseif ($array_accessories['form_type'] == 'assemble_edit')
                <x-form-with-select-items :items="$array_accessories" :assembleId="$array_assemble"></x-form-with-select-items>
            @endif
        </div>
    </div>
