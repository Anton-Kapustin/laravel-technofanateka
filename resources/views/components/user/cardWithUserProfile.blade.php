<div class="card col-12 col-md-8 bg-card-body text-light text-center pb-3 pb-lg-5 pr-lg-5 pl-lg-5 mb-3 border-light mx-auto">
    <div class="card-header">
        <h6 class="justify-content-center">Ваши данные</h6>
    </div>
    <div class="d-flex flex-column">
        @foreach($userData as $key => $item)
            @if(!($key === 'id'))
                <div class="d-flex flex-lg-row flex-column">
                    <div class="col-12 col-lg-6 text-lg-right  border-bottom border-dark">
                        <span>{{__($modelForTranslation.$key)}}: </span>
                    </div>
                    <div class="col-12 col-lg-6 text-lg-left border-bottom border-dark">
                        <span>
                            {{ (Lang::has($modelForTranslation.$item)) ? __($modelForTranslation.$item) : $item }}
                        </span>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="d-flex flex-row justify-content-center">
            <a class="btn nav-links" href="{{route('User.edit', $userData['id'])}}">Редактировать</a>
            @if(Route::currentRouteName() == 'User.show')
                <a class="btn nav-links" href="{{route('password.change.store')}}">Сменить пароль</a>
            @elseif(Route::currentRouteName() == 'User.index')
                <!-- <a class="btn nav-links" href="{{route('password.request')}}">Сбросить пароль</a> -->
            @endif
        </div>
    </div>
</div>