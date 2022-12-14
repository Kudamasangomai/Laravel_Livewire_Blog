@extends('layouts.auth')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Register</h3>
              
              <div class="row">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                   
                <div class="form-group">
                  <label>Name</label>
                  <input id="name" type="text" 
                  class="form-control @error('name') is-invalid @enderror text-white" 
                  name="name" 
                  value="{{ old('name') }}" required autocomplete="name" 
                  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

            
                <div class="form-group ">
                  <label>Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-white" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                  </div>
         
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mb-1">   {{ __('Register') }}</button>
                </div>
              
                <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> {{ __('Login') }}</a></p>
             
                <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
              </form>
            </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

 
  
</div>
</div>
@endsection

