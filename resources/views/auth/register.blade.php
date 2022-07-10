@extends('layouts.app')

@section('content')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
    <noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}" /></noscript>
</head>
<div class="container">
    <div class="row justify-content-center">
    <h4 class="text-center">Silakan daftarkan akun anda</h4>
    <div class="card col-12">
    <div class="row">
                <img src="img/float.png" alt="login" class="login-card-img">
                <div class="card-body text-center"><h3>{{ __('Registrasi') }}</h3><br>

                <div>
                <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="captcha col-md-4 col-form-label text-md-right">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>

                            <div class="col-md-8">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-success">
                                    <b>{{ __('Register') }}</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <script type="text/javascript">
                    $('#reload').click(function () {
                        $.ajax({
                            type: 'GET',
                            url: 'reload-captcha',
                            success: function (data) {
                                $(".captcha span").html(data.captcha);
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
