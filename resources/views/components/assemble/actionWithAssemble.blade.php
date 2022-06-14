@if(Route::currentRouteName() === 'assembleAdmin')
    <div class="d-flex ml-3">
        <a href="{{ route("Assemble.edit", $element->id) }}" class="nav-links mr-2">Радактировать</a>

        <form action="{{ route("Assemble.destroy", $element->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-link nav-links m-0 p-0 pl-2">Удалить</button>
        </form>
        
    </div>
@endif

