@extends('layouts.auth')
@section('body-class','login-page')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf

        {{-- Email --}}
        <div class="input-group mb-3">
          <div class="input-group-text">
            <span class="bi bi-envelope"></span>
          </div>
          <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Email"
            value="{{ old('email') }}"
          />
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Senha --}}
        <div class="input-group mb-3">
          <div class="input-group-text">
            <span class="bi bi-lock-fill"></span>
          </div>
          <input
            type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
          />
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Lembrar-me + botão --}}
        <div class="row">
          <div class="col-8">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember"
              />
              <label class="form-check-label" for="remember">
                Remember Me
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              Login
            </button>
          </div>
        </div>
      </form>

      <!-- /.social-auth-links -->
      <div class="d-grid gap-2 text-center">
        <br />
        <hr style="border: 0; border-top: 1px solid #484c6b91; margin: 0.9rem 0;" />
        <p class="mb-1">
          <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
        <hr style="border: 0; border-top: 1px solid #484c6b91; margin: 0.9rem 0;" />
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">
            Register a new membership
          </a>
        </p>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
  @endsection
