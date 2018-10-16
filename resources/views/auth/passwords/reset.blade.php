@extends('layouts.auth_master')
@section('content')
    <div class="px-5">
        <h5>{{ __('Password Reset') }}</h5>
        <h6>Please enter your email address you used in registering the account and your new password</h6>
        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} passworduser" name="password" required>
                <div id="password_strength"></div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-block mt-4 shadow">{{ __('RESET PASSWORD') }}</button>
        </form>
    </div>
    <a href="{{route('login')}}"><p class="text-center pt-3">Back to Sign In</p></a>

@endsection

@section('script')
    <script>
        var regex = /^[A-Za-z]\w{8,14}$/;

        $(document).on('keyup', '.passworduser', function() {
            var value = $(this).val();
            var color = "Red";

            if (value.length > 7) {
                // Use RegExp.test instead of String.match
                if (value.match(regex)) {
                    // Method chaining
                    $('#password_strength').html("Include a special character,numeric digits and first character must be a letter")
                        .css("color", color);
                } else {
                    $('#password_strength').html("");
                }
            } else {
                $('#password_strength').html("Password to be a minimum of 8 characters")
                    .css("color", color);
            }
        });

    </script>
    
@endsection
