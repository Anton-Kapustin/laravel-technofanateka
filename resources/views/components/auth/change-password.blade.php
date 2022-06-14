<div class="card border-0 bg-form text-light">
    <div class="card-body bg-card-body">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('password.change.store') }}">
            @csrf
            <div class="form-group row {{ $errors->has('current-password') ? ' has-error' : '' }}">
                <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                <div class="col-md-6">
                    <input id="current-password" type="password" class="form-control" name="current-password" required>

                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row {{ $errors->has('new-password') ? ' has-error' : '' }}">
                <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                <div class="col-md-6">
                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row ">
                <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                <div class="col-md-6">
                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-sm btn-action mx-auto">
                        {{ __('Change Password') }}
                    </button>
            </div>
        </form>
    </div>
</div>
