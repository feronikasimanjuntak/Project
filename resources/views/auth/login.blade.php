@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
<noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}" /></noscript>
<div class="container mt-4">
    <div class="row justify-content-center">
        <h4 class="text-center">Silakan masuk ke akun anda</h4>
            <div class="card col-12">
            <div class="row">
                <img src="img/float.png" alt="login" class="login-card-img">
                <div class="card-body text-center"><h3>{{ __('Login') }}</h3><br>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                            </div>
                            <div class="col-form-label text-md-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-success">
                                    <b>{{ __('Login') }}</b>
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-success" href="{{ route('password.request') }}">
                                        <b>{{ __('Forgot Your Password?') }}</b>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
