<div class="d-flex flex-row ">
  <ul class="nav ">
    <li class="nav-item  ">
      <a class="nav-link  mt-0 pt-0  {{ (Route::currentRouteName() == 'admin' ? 'active nav-links-active disabled' : 'nav-links') }}" href="{{route('admin')}}"><small>Новости</small></a>
    </li>
    <li class="nav-item  ">
      <a class="nav-link  mt-0 pt-0 pl-2 {{ (Route::currentRouteName() == 'admin_assemblies_page' ? 'active nav-links-active disabled' : 'nav-links') }}" href="{{route('admin_assemblies_page')}}"><small>Сборки</small></a>
    </li>
  </ul>
</div>