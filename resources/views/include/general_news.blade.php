@section('body')
  <div class="container-fluid mb-5 pl-md-5 pr-md-5">
    <div class="row mt-2 pl-md-5 pr-md-5">
      @if ($users_posts)
        @foreach($users_posts as $post)
      <div class="d-flex col-12 {{( (($users_posts->count() < 3) && ($users_posts->count() >= 2)) ? 'col-md-6 col-lg-6' : '')}}
         {{( $users_posts->count() > 3 ? 'col-md-6 col-lg-4' : '')}} {{( $users_posts->count() == 1 ? 'col-lg-9 mx-auto' : '')}} justify-content-center mx-0 p-1">

        <div class="card text-light border-secondary col-12 mx-0 px-0" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(30,1,46,1) 49%, rgba(28,0,31,1) 100%);">
          <div class="card-header"  style="{{ ( strlen($post->title) < 50 ? 'padding-bottom:37px;' : ' ')}}">
              @if($post->title)
                {{ $post->title }}
          </div>
          <img class="card-img-top mt-3" style="height: 18rem; object-fit: cover;" src="{{ '/res/'.$post->title_image }}">
          <div class="card-body">

                @endif
            <p class="card-text">
              @if($post->body)
                {{ mb_strimwidth($post->body, 0, 100, "...") }}
            </p>
            <a href="{{ route('one_news', $post->id) }}" class="text-info">Подробнее</a>
            @endif
          </div>
          <div class="card-footer">
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
      </div>
      @endforeach
      @endif
      {{ $users_posts->links() }}
    </div>
  </div>
