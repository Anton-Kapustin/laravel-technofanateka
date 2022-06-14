<div class="card bg-form text-light p-0">
    <div class="card-body ">
        <form method="POST" action="{{ route($formAction, $items['id']) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @foreach($items as $name => $value)
                @if($name != 'id')
                    <x-form.formInputText :name=$name :value=$value type='text' :modelForTranslation=$modelForTranslation />
                @endif
            @endforeach
            <x-form.formButtonSubmit />
        </form>
    </div>
</div>
