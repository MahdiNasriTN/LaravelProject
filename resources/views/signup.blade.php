@extends('template')

@section('scripts')
    <script type="text/javascript" src="{{asset('scripts/login.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/signup.css') }}">
    
@endsection

@section('title')
    SignUp
@endsection

@section('content')        
      <div id="stars"></div>
      <div id="stars2"></div>
      <div id="stars3"></div>
      <div class="container">
        <div class="row px-3">
          <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
    
            <div class="card-body" >
              <h4 class="title text-center mt-4">
                Create An Account
              </h4>
                <form class="form-box px-3 needs-validation" action="{{route('authentification.signup')}}" method="POST">
                    @csrf
                    <div class="form-input">
                        <span><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" name="name" placeholder="User Name" tabindex="10" required value="{{old('name')}}">
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        You need to add your username!
                        </div>
                    </div>
                    <div class="form-input">
                    <span><i class="fa fa-envelope-o"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email Address" tabindex="10" id="email" required value="{{old('email')}}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Email Is required!
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
                        Password is required!
                    </div>
                    </div>
                    <!-- <div class="form-file custom-file">
                        <input type="file" class="form-file-input" id="image" name="image">
                        <label class="form-file-label" for="image">
                            <span class="form-file-text custom-file-label">Choose image(s)...</span>
                        </label>
                    </div> -->
        
                    <div class="mb-3">
                    </div>
        
                    <div class="mb-3">
                    <button type="submit" class="btn btn-block text-uppercase">
                        SignUp
                    </button>
                    </div>
                    <div class="text-center mb-4 mt-2">
                    @if(session()->has('info'))
                        <div class="bar success">{{session('info')}}</div>
                    @elseif(session()->has('error'))
                        <div class="bar error">{{session('error')}}</div>
                    @endif
                    </div>
                    <div class="text-right">
                    </div>

                    <div class="text-center mb-2">
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection