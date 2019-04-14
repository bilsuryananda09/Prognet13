@extends('layouts.adminformregister')

@section('title')
    Register Admin
@endsection

@section('content') 
<div class="col-lg-4 mx-auto">
    <h2 class="text-center mb-4">Register</h2>
    <div class="auto-form-wrapper">
      @isset($url)  
        <form method="POST" action='{{ url("register/$url") }}'>
      @else
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
      @endisset
      @csrf
        <div class="form-group">
            <div class="input-group">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
              @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
              @endif
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input id="profile_image" type="text" class="form-control{{ $errors->has('profile_image') ? ' is-invalid' : '' }}" name="profile_image" value="{{ old('profile_image') }}" required autofocus placeholder="Profile Image">
            @if ($errors->has('profile_image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('profile_image') }}</strong>
                </span>
            @endif
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary submit-btn btn-block">{{ __('Register') }}</button>
        </div>
        <div class="text-block text-center my-3">
          <span class="text-small font-weight-semibold">Already have and account ?</span>
          <a href="login.html" class="text-black text-small">Login</a>
        </div>
      </form>
    </div>
  </div>
@endsection