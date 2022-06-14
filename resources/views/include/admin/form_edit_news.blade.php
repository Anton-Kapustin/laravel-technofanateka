@section('form')
  <div class="card bg-form text-light border rounded">
      <div class="card-header bg-form-header">Редактирование</div>

      <div class="card-body">
          <form method="POST" action="{{ route('update_news_in_db') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>

                  <div class="col-md-6">
                      <input id="title" type="text" class="form-control" name="title" value="{{ $user_post->title }}" required autocomplete="title" autofocus rows="3">

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="body" class="col-md-4 col-form-label text-md-right">Текст новости</label>

                  <div class="col-md-6">
                      <textarea type="text" class="form-control p-0" name="body" required autofocus rows="5">
                        {{ $user_post->body }}
                      </textarea>
                      <input type="hidden" name="id" value={{$user_post->id}}>
                      @error('body')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                @if ($message = Session::get('success'))
                  <div class=«alert alert-success alert-block»>
                      <button type=«button» class=«close» data-dismiss=«alert»>×</button>
                          <strong>{{ $message }}</strong>
                  </div>
                  <img src="res/{{ Session::get('title_image') }}">
                  @endif

                  @if (count($errors) > 0)
                      <div class=«alert alert-danger»>
                          <strong>Whoops!</strong> There were some problems with your input.
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <label for="title_image" class="col-md-4 col-form-label text-md-right">Фоновое изображение</label>

                  <div class="col-md-6">
                      <input type="file" multiple name="title_image">

                  </div>
              </div>

              <div class="form-group row mb-0">
                <button type="submit" class="btn btn-sm btn-info mx-auto">
                    Отправить
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
