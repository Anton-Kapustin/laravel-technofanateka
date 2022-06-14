@section('body')
<div class="container pt-md-2 pl-md-5 pr-md-5">
    <div class=" justify-content-center rounded">
            <div class="card border-secondary text-white w-100 pl-md-1 pr-md-1 mb-3" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
                <div class="card-header pl-0">
                  <div class="d-flex flex-column flex-md-row align-items-center">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pl-2 ml-0 mr-auto ">
                      Привет, {{ Auth::user()->first_name }}
                      {{ Auth::user()->last_name }}
                    </div>

                    <!-- Показать на большом экране -->
                    <div class="d-none d-md-block col-md-6 col-lg-6 text-right pr-0 ml-auto">
                      <a href="{{route('send_news')}}" class=" nav-links">Предложить новость</a>
                    </div>

                    <!-- Показать на телефоне -->
                    <div class="d-md-none col-xs-12 p-0 pt-1 mr-auto ml-2">
                      <a href="{{route('send_news')}}" class="btn-link nav-links">Предложить новость</a>
                    </div>

                  </div>
                </div>

                <div class="card-body m-0 p-0">
                  @if (Route::currentRouteName() != 'admin_settings')
                    @if($users_posts)
                     @foreach($users_posts as $user_posts)
                       <div class="card text-white border-secondary w-100 mb-3 p-0 m-0" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
                         <div class="card-header" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
                           <div class="d-flex flex-lg-row flex-column align-items-center">
                             <div class="col-12 col-lg-9 p-0 mp-0">
                               <h6 class="font-weight-bold text-justify">{{$user_posts->title}}</h6>
                             </div>
                             <div class="col-12 col-lg-3 text-lg-right text-info justify-content-left p-0" >
                              <a class="  btn-sm p-0 {{($user_posts->published == 1? 'text-muted ' : 'nav-links')}}" href="{{ ($user_posts->publised == 1 ? route('admin_delete_news', $user_posts->id) : route('admin_publish_news', $user_posts->id)) }}" >Опубликовать</a>
                              <a class="  btn-sm p-0 {{($user_posts->top_news == 1? 'text-muted ' : 'nav-links')}}" href="{{ ($user_posts->top_news == 1 ? route('delete_from_top_news', $user_posts->id) : route('add_to_top_news', $user_posts->id)) }}">Top News</a>
                              <a class="  btn-sm p-0 nav-links" href="{{ route('admin_edit_news', $user_posts) }}">Редактировать</a>
                              <a class="  btn-sm p-0 nav-links" href="{{ route('admin_delete_news', $user_posts->id) }}">Удалить</a>
                             </div>
                           </div>
                         </div>
                         <img class="card-img-top " style="height: 100%; object-fit: cover;" src="{{'/res/'.$user_posts->title_image}}">
                         <div class="card-body text-justify" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
                           <p class="card-text" >{{$user_posts->body}}</p>
                         </div>
                         <div class="card-footer">
                           <div class="d-flex">
                             <div class="col-6">
                                @foreach($users as $user)
                                  @if($user->id == $user_posts->user)
                                    <small class="text-muted">{{$user->first_name}} {{$user->last_name}}</small>
                                  @endif
                                @endforeach

                             </div>
                             <div class="col-6 text-right">
                               <small class="text-muted">{{$user_posts->created_at}}</small>
                             </div>
                           </div>

                         </div>
                       </div>
                       @endforeach
                </div>
            </div>
            <div class="container pt-3 pb-5 d-block d-md-none">
              {{ $users_posts->links('custom_pagination.mobile_pagination') }}
            </div>
            <div class="container pt-3 pb-5 d-none d-md-block">
              {{ $users_posts->onEachSide(1)->links() }}
            </div>
              @endif
            @else
            <div class="card text-white border-secondary w-100 mb-3 p-0 m-0" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
              <div class="card-header" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
                <h5>Telegram Settings</h5>
                <ul class="list-unstyled">
                  <li> Telegram PUSH: <a class="btn btn-circle {{($telegram_status['webhook'] == 1 ? 'btn-success text-success' : 'btn-danger text-danger')}} " href="{{($telegram_status['webhook'] == 1 ? route('telegram_remove_webhook')  : route('telegram_set_webhook'))}}"></a></li>
                </ul>
              </div>
            </div>
          @endif
        </div>
    </div>
@endsection
