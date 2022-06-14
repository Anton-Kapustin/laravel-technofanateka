@section('navbar_pc_assemblies')
    <div class="container">
        <nav class="navbar navbar-expand-lg text-light ">
            <ul class="navbar-nav">
                <li class="m-2"><a href="" class="btn-link {{ (Route::currentRouteName() == 'pc_gamer' ? 'active nav-links-active' : 'nav-links') }}">Игровые ПК</a></li>
                <li class="m-2"><a href="" class="btn-link {{ (Route::currentRouteName() == 'pc_office' ? 'active nav-links-active' : 'nav-links') }}">Офисные ПК</a></li>
                <li class="m-2"><a href="" class="btn-link {{ (Route::currentRouteName() == 'HomePage' ? 'active nav-links-active' : 'nav-links') }}"">Своя сборка</a></li>
            </ul>
        </nav>
    </div>

