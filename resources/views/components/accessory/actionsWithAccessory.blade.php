<div class="d-flex ml-3">
    <a href="{{ route($accessoryName.".edit", $element->id) }}" class="nav-links mr-2">Радактировать</a>

    <form action="{{ route($accessoryName.".destroy", $element->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-link nav-links m-0 p-0">Удалить</button>
    </form>
    
</div>

