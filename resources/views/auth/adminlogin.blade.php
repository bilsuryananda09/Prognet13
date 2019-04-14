@extends('layouts.adminformlogin')

@section('title')
    Login Admin
@endsection

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auto-form-wrapper">
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}'>
        @else
        <form method="POST" action="{{ route('login') }}">
        @endisset
        @csrf
            <div class="form-group">
              <label for="username" class="label">{{ __('Username') }}</label>
              <div class="input-group">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="label">{{ __('Password') }}</label>
              <div class="input-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="*********">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary submit-btn btn-block">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label" for="remember">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="text-block text-center my-3">
              <span class="text-small font-weight-semibold">Not a member ?</span>
              <a href="register.html" class="text-black text-small">Create new account</a>
            </div>
          </form>
    </div>
  </div>
@endsection