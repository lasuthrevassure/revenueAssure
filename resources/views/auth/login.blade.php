@extends('layouts.auth_master')
@section('content')
  <div class="px-5">
    <h5 class="space">Sign In to your account</h5>
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      @csrf
      <div class="form-group">
        <label for="userEmail">Email Address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" placeholder="yourmail@email.com" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <label for="userPassword">Password</label>
        <div class="input-group" id="show_hide_password">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          </div>
      </div>
      <p><a style="color:#45d88e" href="{{ route('password.request') }}">I forgot my password</p>
      <button type="submit" class="btn shadow">SIGN IN</button>
    </form>
  </div>
@stop