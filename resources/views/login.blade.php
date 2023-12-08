@extends('template')

@section('scripts')
    <script type="text/javascript" src="{{asset('scripts/login.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
    
@endsection

@section('title')
    Login
@endsection

@section('content')
      <div id="stars"></div>
      <div id="stars2"></div>
      <div id="stars3"></div>
      <div class="container">
        <div class="row px-3">
          <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
            <div class="img-left d-none d-md-flex"></div>
    
            <div class="card-body" >
              <h4 class="title text-center mt-4">
                Login into account
              </h4>
              <form class="form-box px-3 needs-validation" method ="post" action="/login" novalidate>
                @csrf
                <div class="form-input">
                  <span><i class="fa fa-envelope-o"></i></span>
                  <input class="form-control" type="email" name="email" placeholder="Email Address" tabindex="10" id="email" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Email is required !
                  </div>
                </div>
                <div class="form-input">
                  <span><i class="fa fa-key"></i></span>
                  <span><i id="Eye" onclick="clickeye()" class="fa fa-eye-slash"></i></span>
                  <input class="form-control" type="password" name="password" placeholder="Password" id="pass" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Password is required !
                  </div>
                </div>
    
                <div class="mb-3">
                </div>
    
                <div class="mb-3 buttlogin">
                  <button type="submit" class="btn btn-block text-uppercase">
                    Login
                  </button>
                </div>
    
                <div class="text-center">
                  <a href="/resetpassword" class="forget-link">
                    Forget Password?
                  </a>
                </div>
                <hr class="my-4">
                <div class="text-center mb-4 mt-2">
                  @if(session()->has('info'))
                    <div class="bar success">{{session('info')}}</div>
                  @elseif(session()->has('error'))
                    <div class="bar error">{{session('error')}}</div>
                  @endif
                </div>
                <div class="text-center mb-2">
                  Don't have an account?
                  <a href="/signup" class="register-link">
                    Register here
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection