<div class="container text-white ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-card-body">
                <div class="card-header bg-card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @elseif (session('limit'))
                        <div class="alert alert-danger" role="alert">
                            {{ __(session('limit')) }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline nav-links">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>