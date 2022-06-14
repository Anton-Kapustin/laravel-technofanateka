<nav class="navbar navbar-expand-lg pl-md-5 pr-md-5 w-100 bg-nav">
    <a class="navbar-brand border-basic-color rounded-circle text-light" href="{{ route('HomePage') }}"><strong class="navbar-link">&nbsp;&nbsp;TF&nbsp;&nbsp;</strong></a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'Assemble.index' ? ' nav-links-active ' : 'navbar-link') }} " href="{{ route('Assemble.index') }}">Сборки ПК <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'News.index' ? ' nav-links-active ' : 'navbar-link') }}" href="{{route('News.index')}}">Новости IT</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'ContactsPage' ? 'nav-links-active   ' : 'navbar-link') }}" href="{{route('ContactsPage')}}">Контакты</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto mr-md-5">

        @auth

            <li class="nav-item">
                <a href="{{route('Cpu.index')}}" class="nav-link  {{ (Route::currentRouteName() == 'accessoryCpu' ? 'active navbar-link-active' : 'navbar-link') }}">Комплектующие</a>
            </li>

            <li class="d-flex nav-item align-items-center pl-lg-2">
                <div class=" dropdown rounded dropdown-menu-left p-1">
                    <a href="#" class="navbar-link dropdown-toggle fa fa-user-circle" role="menu" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">  <span class="caret"></span></a>
                    <ul class="col-12 border dropdown-menu p-1 bg-nav">
                        <li class="p-0 m-0"><a class=" {{ (Route::currentRouteName() == 'User.show' ? 'active active-link-disabled' : 'navbar-link') }}" href="{{route('User.show', Auth::user()->id)}}"><small> Профиль </small></a></li>
                        @if(Auth::user()->admin)
                            <li ><a class="nav-link p-0 m-0  {{ (Route::currentRouteName() == 'User.index' ? 'active active-link-disabled disabled' : 'navbar-link') }}" href="{{route('User.index')}}"><small>Пользователи</small></a>
                            </li>
                        @endif

                        <li ><a class="nav-link  p-0 m-0 {{ (Route::currentRouteName() == 'newsAdmin' ? 'active active-link-disabled disabled' : 'navbar-link') }}" href="{{route('newsAdmin')}}"><small>Новости</small></a>
                        </li>
                        <li ><a class="nav-link p-0 m-0  {{ (Route::currentRouteName() == 'assembleAdmin' ? 'active active-link-disabled disabled' : 'navbar-link') }}" href="{{ route('assembleAdmin') }}"><small>Сборки</small></a>
                        </li>
                        <div class="dropdown-divider "></div>
                        <a class="navbar-link" href="{{route('logout')}}"><small>Выход</small></a>
                    </ul>
                </div>
            </li>

        @else
            @if ((Route::currentRouteName() != 'login') and (Route::currentRouteName() != 'admin_panel'))
                <li class="nav-item">
                    <a class="btn navbar-link" href="{{route('login')}}">Вход</a>
                </li>
            @endif
            @if ((Route::currentRouteName() != 'register') and (Route::currentRouteName() != 'admin_panel'))
                <li class="nav-item">
                    <a class="btn navbar-link" href="{{route('register')}}">Регистрация</a>
                </li>
            @endif
        @endauth


        </ul>

    </div>
</nav>
