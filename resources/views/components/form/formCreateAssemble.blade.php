<form method="POST" action="{{ route($formAction) }}" enctype="multipart/form-data">
    @csrf
    @foreach($arrayWithAccessories as $name => $items)
        <x-form.formSelectItems :name=$name :items=$items type='text' option='' :modelForTranslation=$modelForTranslation >
        </x-form.formSelectItems>
    @endforeach
    <x-form.formInputText name='price' value='' type='text' :modelForTranslation=$modelForTranslation />
    <x-form.formInputText name='preview_image' value='' type='file' :modelForTranslation=$modelForTranslation />
    <x-form.formButtonSubmit />
</form>