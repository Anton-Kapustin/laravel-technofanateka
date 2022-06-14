@section('show_news')
<div class="container">
    <div class="d-flex justify-content-center rounded">
            <div class="card text-white bg-dark border-dark w-100 p-0 mb-3">
                <div class="card-header">
                  <div class="d-flex flex-column flex-md-row align-items-center ">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pl-1 mr-auto">
                      Привет, {{ Auth::user()->first_name }}
                      {{ Auth::user()->last_name }}
                    </div>

                    <!-- Показать на большом экране -->
                    <div class="d-none d-md-block col-md-6 col-lg-6 text-right ml-auto">
                      <a href="{{route('send_news')}}" class="btn btn-dark">Предложить новость</a>
                    </div>

                    <!-- Показать на телефоне -->
                    <div class="d-md-none col-xs-12 pl-1 pt-1 mr-auto">
                      <a href="{{route('send_news')}}" class="btn btn-dark">Предложить новость</a>
                    </div>

                  </div>
                </div>


                <div class="card-body m-0 p-0">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if('users_posts')
                     <p> </p>
                     @foreach($users_posts as $user_posts)
                       <div class="card text-white bg-dark border-secondary text-justify w-100 mb-3 p-0 m-0">
                         <div class="card-header">

                           {{$user_posts->title}}
                         </div>
                         <img class="card-img-top mt-3" style="height: 100%; object-fit: cover;" src="{{'/res/'.$user_posts->title_image}}">
                         <div class="card-body">
                           <h5 class="card-title">{{$user_posts->title}}</h5>
                           <p class="card-text">{{$user_posts->body}}</p>

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
                    @endif


                </div>
                <div class="card-footer bg-dark">
                  {{$users_posts->links()}}

                </div>

            </div>
        </div>
    </div>
@endsection
