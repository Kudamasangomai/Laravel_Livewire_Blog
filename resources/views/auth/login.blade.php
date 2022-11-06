@extends('layouts.auth')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label>Username or email *</label>
                  <input id="email" type="email" class="form-control text-white" name="email" value="{{ old('email') }}" required 
                  autocomplete="email" autofocus>
                  @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input id="password" type="password" class="form-control text-white" name="password" required autocomplete="current-password">
                  @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group d-flex align-items-center justify-content-between"></div>
                <div class="text-left text-lg">
                    <div class="col-md-8 offset-md-4 mb-2 ">
                        <button type="submit" class="btn btn-primary">
                          <i class="mdi mdi-logout text-white"></i>     {{ __('Login') }}
                        </button>
                    </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-facebook me-2 col">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up">Don't have an Account?<a  href="{{ route('register') }}"> {{ __('Register') }}</a></p>


            
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection


 
