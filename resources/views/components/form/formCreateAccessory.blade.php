<div class="card  bg-form  text-light  p-0">

    <div class="card-body ">
        <form method="POST" action="{{ route($formAction) }}" enctype="multipart/form-data">
            @csrf
            @foreach($arrayWithColumns as $key => $columnName)
                @if($columnName != 'id')
                    <x-form.formInputText :name=$columnName value='' type='text' :modelForTranslation=$modelForTranslation />
                @endif
            @endforeach
            <x-form.formButtonSubmit />
        </form>
    </div>
</div>
