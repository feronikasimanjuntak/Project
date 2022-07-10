@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
<noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}" /></noscript>
<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center">Silakan masukkan email untuk konfirmasi di sini</h4>
            <div class="card col-12">
            <div class="row">
                <img src="/img/float.png" alt="login" class="login-card-img">
                <div class="card-body text-center"><h3>{{ __('Reset Password') }}</h3><br>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success">
                                    <b>{{ __('Send Password Reset Link') }}</b>
                                </button>
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
