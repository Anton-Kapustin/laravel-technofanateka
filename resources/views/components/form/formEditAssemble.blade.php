<form method="POST" action="{{ route($formAction, $assemble['id']) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @foreach($arrayWithAccessories as $name => $items)
        <x-form.formSelectItems :name=$name :items=$items type='text' :modelForTranslation=$modelForTranslation >
            <x-slot name="option">
                
                    @isset($assemble->$name->model)
                        <option class="font-weight-bold" value="{{ $assemble->$name->id }}">
                            {{ $assemble->$name->model }}
                        </option>
                    @endisset
                    @empty($assemble->$name->model)
                        <option class="font-weight-bold" value="{{ $assemble->$name }}">
                            {{ $assemble->$name }}
                        </option>
                    @endempty

                <option disabled="disabled"> </option>
            </x-slot>
        </x-form.formSelectItems>
    @endforeach
    <x-form.formInputText name='price' :value='$assemble->price' type='text' :modelForTranslation=$modelForTranslation />
    <x-form.formInputText name='preview_image' value='' type='file' :modelForTranslation=$modelForTranslation />
    @php ($path = '/res/assemblies_preview/'.$assemble->preview_image)
    <x-layouts.previewImage :path=$path objectFit='cover' width='100%' height='auto' padding='pb-3 col-12 col-lg-7' />
    <x-form.formButtonSubmit />
</form>