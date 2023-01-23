@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('MyMTV')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <!-- <div class="text-center">
      <img src="{{ asset('images') }}/Logo_Icon.png" alt="logo" />
      <div class="text-left">
        <h3>Create Your Account</h3>
        <h4 class="theme-color">Step 1</h4>
      </div>      
    </div> -->
    <div class="col-lg-5 col-md-7 col-sm-9 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        
        <div class="card card-hidden mb-3" style="background-color: #000;">
          <div class="card-header text-center">            
            
            {{-- <div class="text-left">
              <h3 class="bold">Login Your Account</h3>             
            </div> --}}
            <img src="{{ asset('images') }}/logo.svg" class="logo-md" alt="logo" />
          </div>
          <div class="card-body p-0-10">
            <!-- <p class="card-description text-center">{{ __('Or Sign in with ') }} <strong>admin@material.com</strong> {{ __(' and the password ') }}<strong>secret</strong> </p> -->
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="{{ __('Email or Phone') }}" value="{{ old('email', 'admin@example.com') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" value="{{ !$errors->has('password') ? "secret" : "" }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-rose btn-link btn-lg">{{ __('Lets Go') }}</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
