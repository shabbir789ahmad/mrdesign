@extends('admin.master')

@section('content')
<style>
    .a{
        font-size:2vw;
        font-weight:bold;
    }
    label{
     font-weight:bold;
     margin-top:1%;
    }
    .card{
        width:90%;
    }
    .container_top{
        margin-top: 10%;
    }

</style>

<div class="container container_top">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center a mt-5" >MrDesign</div>

                <div class="card-body pt-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <label for="email">{{ __('Email Address') }}</label>
                          <input id="email" type="email" class="form-control border border-secondary @error('email') is-invalid @enderror py-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <label for="password" class="mt-3" >{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control py-4 border border-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      

                        <div class="row mb-3 d-flex">
                            <div class="col-md-6  mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div classc="col-md-6">
                           @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot  Password?') }}
                                    </a>
                                @endif
                           </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger btn-block py-3">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
