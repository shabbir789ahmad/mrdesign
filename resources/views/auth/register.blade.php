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
        width:100%;
    }
    .container_top{
        margin-top: 5%;
    }

</style>

<div class="container container_top">
  <div class="row justify-content-center mt-5">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header text-center a mt-5" >MrDesign</div>
          <div class="card-body pt-0">
            <form method="POST" action="{{ route('register') }}">
             @csrf
             
             <label for="name">{{ __('Full Name') }}</label>
             <input id="name" type="name" class="form-control border border-secondary @error('name') is-invalid @enderror py-4" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror

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

             <label for="password-confirm" class="mt-3" >{{ __('Password') }}</label>
             <input id="password-confirm" type="password" class="form-control py-4 border border-secondary @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

             @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
             @enderror

             <label for="image">{{ __('Email Address') }}</label>
             <input id="image" type="file" class="form-control border border-secondary @error('image') is-invalid @enderror py-4" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

              @error('image')
              <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
                      
              <div class="row mb-0 mt-5">
               <div class="col-md-12">
                <button type="submit" class="btn btn-danger btn-block py-3">
                 {{ __('Register') }}
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
