@extends('layouts.app')
@section('content')
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body pb-5 pt-5">
      <div class="row">
        <div class="col-6 pr-4">
          <div class="login-logo">
            <span><b>LOGIN </b>USER</span>
          </div>
          <form action="{{ route('login') }}" method="post">
          @csrf
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="row">
              <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-flat">Sign In</button>
              </div>
            </div>
          </form>
        </div>
        <div class="vl"></div>
        <div class="col-6 text-center">
          <img class="logo-login" src="{{ asset('/logo.png')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
