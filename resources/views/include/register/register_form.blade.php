@section('form')

  <div class="card bg-form text-light border rounded">
      <div class="card-header bg-form-header">Регистрация нового пользователя</div>

      <div class="card-body">
          <form method="POST" action="{{ route('RegisterPage') }}">
              @csrf

              <div class="form-group row">
                  <label for="first_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                  <div class="col-md-6">
                      <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="last_name" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                  <div class="col-md-6">
                      <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                      @error('last_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтверждение пароля</label>

                  <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="age" class="col-md-4 col-form-label text-md-right">Возраст</label>

                  <div class="col-md-6">
                      <input id="age" type="age" class="form-control" name="age" required autocomplete="age">
                  </div>
              </div>

                 <div class="form-group row">
                   <legend class="col-md-4 col-form-label text-md-right">Пол</legend>
                   <div class="col-md-6">

                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" >
                       <label class="form-check-label" for="gridRadios1">
                         Мужской
                       </label>
                     </div>

                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                       <label class="form-check-label" for="gridRadios2">
                         Женский
                       </label>
                     </div>

                   </div>
                 </div>

              <div class="form-group row mb-0">
                      <button type="submit" class="btn btn-sm btn-info mx-auto">
                          Регистрация
                      </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
