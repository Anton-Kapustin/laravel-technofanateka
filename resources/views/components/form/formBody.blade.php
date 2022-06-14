<div class="card col-md-8 bg-form border text-light mb-5 p-0">
    <div class="d-flex flex-row card-header bg-form-header text-center">
        <div class="d-flex col-4">
            <x-boostrap-parts.buttonBack />
        </div>
        <div class="d-flex col-4 justify-content-center">{{ $title }}</div>     
    </div>
    <div class="card-body justify-content-center ml-md-5 mr-md-5 p-5">
        {{ $body }}
    </div>
</div>