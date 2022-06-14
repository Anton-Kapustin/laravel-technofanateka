@section('navbar')
  <nav class="navbar navbar-expand-lg pl-md-5 pr-md-5" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
      <a class="navbar-brand border rounded-circle text-light " href="{{route('HomePage')}}"><strong>&nbsp;&nbsp;TF&nbsp;&nbsp;</strong></a>
      <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link {{ (Route::currentRouteName() == 'pc_assemblies' ? 'active nav-links-active' : 'nav-links') }} " href="{{route('pc_assemblies')}}">Сборки ПК <span class="sr-only">(current)</span></a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'HomePage' ? 'active nav-links-active' : 'nav-links') }} " href="{{route('pc_configurator')}}">Конфигуратор ПК <span class="sr-only">(current)</span></a>
            </li> --}}
              <li class="nav-item">
                  <a class="nav-link {{ (Route::currentRouteName() == 'NewsPage' ? 'active nav-links-active' : 'nav-links') }}" href="{{route('NewsPage')}}">Новости IT</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'NewsPage' ? 'active nav-links-active' : 'nav-links') }}" href="{{route('NewsPage')}}">Статьи</a>
            </li> --}}
              <li class="nav-item">
                  <a class="nav-link {{ (Route::currentRouteName() == 'ContactsPage' ? 'active nav-links-active' : 'nav-links') }}" href="{{route('ContactsPage')}}">Контакты</a>
              </li>
          </ul>

          <ul class="navbar-nav ml-auto mr-md-5">

            @auth
              <li class="nav-item pr-md-4 ">
                <div class=" dropdown rounded dropdown-menu-left ">
                  <a href="#" class="nav-links dropdown-toggle" role="menu" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">Меню <span class="caret"></span></a>
                  <ul class="col-12 dropdown-menu p-1" style="background: #1c001f;">
                    <li><a class=" {{ (Route::currentRouteName() == 'admin' ? 'active nav-links-active' : 'nav-links') }}" href="{{route('admin')}}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></li>
                    <li><a class="nav-links" href="{{ route('admin_settings')}}">Настройки</a></li>
                    <div class="dropdown-divider"></div>
                    <a class="nav-links" href="{{route('logout')}}">Выход</a>
                  </ul>
                </div>
              </li>

            @else
              @if ((Route::currentRouteName() != 'LoginPage') and (Route::currentRouteName() != 'admin_panel'))
                <li class="nav-item">
                  <a class="nav-link nav-links" href="{{route('LoginPage')}}">Вход</a>
                </li>
              @endif
              @if ((Route::currentRouteName() != 'RegisterPage') and (Route::currentRouteName() != 'admin_panel'))
                <li class="nav-item">
                  <a class="nav-link nav-links" href="{{route('RegisterPage')}}">Регистрация</a>
                </li>
              @endif
            @endauth


          </ul>

      </div>
  </nav>
