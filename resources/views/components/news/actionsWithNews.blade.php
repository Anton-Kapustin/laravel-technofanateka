<div class="col-12 col-lg-3 text-lg-right text-info justify-content-left p-0" >
    <a class="  btn-sm p-0 {{($partOfNews->published == 1? 'text-muted ' : 'nav-links')}}" href="{{ ($partOfNews->published == 1 ? route('admin_archive_news', $partOfNews->id) : route('admin_publish_news', $partOfNews->id)) }}" >
        <small>Опубликовать</small>
    </a>
    <a class="  btn-sm p-0 pl-2 pl-lg-0 {{($partOfNews->top_news == 1? 'text-muted ' : 'nav-links')}}" href="{{ ($partOfNews->top_news == 1 ? route('delete_from_top_news', $partOfNews->id) : route('add_to_top_news', $partOfNews->id)) }}">
        <small>Top News</small>
    </a>
    <a class="  btn-sm p-0 pl-2 pl-lg-0 nav-links" href="{{ route('News.edit', $partOfNews) }}">
        <small>Редактировать</small>
    </a>

    <form action="{{ route("News".".destroy", $partOfNews->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-link nav-links m-0 p-0"><small>Удалить</small></button>
    </form>
</div>
