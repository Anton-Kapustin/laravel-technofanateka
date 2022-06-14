@section('body')

  <div class="container col-12 col-lg-7 mr-md-5 ml-md-5 mx-md-auto mb-5">
      @if ($users_posts)
        @foreach($users_posts as $post)


        <div class="card border-secondary text-light col-12 pl-0 pr-0 mt-1 mb-2 pt-1" style="background: #1e012e;">
          <div class="card-header bg-card-header" >
              @if($post->title)
                <h6 class="text-justify font-weight-bold">{{ $post->title }}</h6>
              @endif
          </div>
          <div class="container">

            <img class="d-none d-md-block card-img-top mt-1 text-center img-rounded" style="height: 20rem; object-fit: contain; overflow: hidden; filter: none !important;" src="{{ '/res/'.$post->title_image }}" alt="Card image">
            <img class="d-md-none card-img-top mt-1 text-center img-rounded" style=" object-fit: contain; filter: none !important;" src="{{ '/res/'.$post->title_image }}" alt="Card image">
          </div>
          <div class="card-body pb-2 bg-card-body">

              @if($post->body)

                <p class="card-text d-none d-md-block mb-1 text-left text-md-justify font-weight-normal">
                  {{mb_strimwidth($post->body, 0, 400, "...")}}
                </p>
                <p class="card-text d-block d-md-none mb-1 text-left text-md-justify font-weight-light">
                  {{mb_strimwidth($post->body, 0, 400, "...")}}
                </p>
                <a class="nav-links" href="{{ route('one_news', $post->id) }}">
                  Подробнее
                </a>

              @endif

          </div>
          <div class="card-footer bg-card-header">
            <div class="d-flex">
                @foreach($users as $user)
                  @if($user->id == $post->user)
                    <div class="col-6 p-0">
                      <small class="text-muted">{{ $user->first_name }} {{ $user->last_name}}</small>
                    </div>
                    <div class="col-6 text-right p-0">
                      <small class="text-muted">{{$post->created_at}}</small>
                    </div>
                  @endif
                @endforeach
            </div>
          </div>
        </div>
      @endforeach
      @endif
      <div class="container pt-3 pb-5 d-block d-md-none">
        {{ $users_posts->links('custom_pagination.mobile_pagination') }}
      </div>
      <div class="container pt-3 pb-5 d-none d-md-block">
        {{ $users_posts->onEachSide(1)->links() }}
      </div>

  </div>
