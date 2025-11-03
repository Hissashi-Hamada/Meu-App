@extends('layouts.auth')
@section('body-class', 'register-page')
@section('content')
    <div class="register-box">
      <div class="register-logo">
        <a href="../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.register-logo -->
        <div class="card">
          <div class="card-body register-card-body">
            <p class="register-box-msg">Register a new membership</p>
          
            <form action="{{ route('register') }}" method="post">
              @csrf
            
              {{-- Nome --}}
              <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-person"></span></div>
                <input
                  type="text"
                  name="name"
                  class="form-control @error('name') is-invalid @enderror"
                  placeholder="Full Name"
                  value="{{ old('name') }}"
                />
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            
              {{-- Email --}}
              <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
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
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
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
            
              {{-- Confirmar senha --}}
              <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                <input
                  type="password"
                  name="password_confirmation"
                  class="form-control"
                  placeholder="Confirm Password"
                />
              </div>
            
              <div class="row">
                <div class="col-8">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
              </div>
            
              <div class="d-grid gap-2 ">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
                   <hr style="border: 0; border-top: 1px solid #484c6b91; margin: 0.9rem 0;">
            <p class="mb-0">
              <a href="login.html" class="text-center">I already have a membership</a>
            </p>
          </div>
        </div>

        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->
@endsection