@extends('layouts.auth_master')
@section('content')
    <div class="px-5">
        <h5>Forgot Password ?</h5>
        <h6>Please enter your email address you used in registering the account. We will email you instructions on how  to reset your password</h6>
        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <div class="form-group">
                <label for="userEmailForgot">Email Address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="yourmail@email.com" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <button type="submit" class="btn btn-block mt-4 shadow">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>
    <a href="{{route('login')}}"><p class="text-center pt-3">Back to Sign In</p></a>
@stop