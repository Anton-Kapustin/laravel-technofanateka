
<body class="text-white">
    <h3 class="text-white">{{ __('Reset Password') }}</h3>
        <div class="text-white">
            {{ __('passwords.Hi, :name', ['name' => $name]) }} {{ __('passwords.You are receiving this email because we received a password reset request for your account' )  }} <br>
             <a href="{{ $url }}">{{ __('passwords.Reset Password') }}</a><br>
             
             {{ __('passwords.This password reset link will expire in 60 minutes').'.' }}<br>

             {{ __('passwords.If you did not request a password reset, no further action is required').'.' }}
        </div>

</body>
