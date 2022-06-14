@section('form')

  <div class="card text-light border rounded bg-form">
      <div class="card-header bg-form-header">Предложите новость</div>

      <div class="card-body">
          <form method="POST" action="{{ route('send_news') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>

                  <div class="col-md-6">
                      <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus>

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
                      <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" autofocus rows="5">
                      </textarea>
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
