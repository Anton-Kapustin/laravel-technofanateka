<div class="card-header pl-0 text-white mt-1">
    <div class="d-flex flex-column flex-md-row align-items-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pl-2 ml-0 mr-auto ">
            Привет, {{ Auth::user()->first_name }}
            {{ Auth::user()->last_name }}
        </div>

        <!-- Показать на большом экране -->
        <div class="d-none d-md-block col-md-6 col-lg-6 text-right pr-0 ml-auto">
            <a href="{{route('News.create')}}" class=" nav-links">Предложить новость</a>
        </div>

        <!-- Показать на телефоне -->
        <div class="d-md-none col-xs-12 p-0 pt-1 mr-auto ml-2">
            <a href="{{route('News.create')}}" class="btn-link nav-links">Предложить новость</a>
        </div>

    </div>
</div>