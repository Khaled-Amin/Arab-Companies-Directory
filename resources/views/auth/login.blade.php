<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href={{ url('/../public/fonts/material-icon/css/material-design-iconic-font.min.css') }}>

    <!-- Main css -->
    <link rel="stylesheet" href={{ url('/../public/css/style.css') }}>

</head>
<style>
    body {
        background-image: url({{ url('/../public/upload/body-bg.jpg') }})
    }

</style>

<body>
    <div class="main">
        <div class="container"><br>

            <form method="POST" action="{{ route('login') }}" class="appointment-form" id="appointment-form">
                @csrf
                <h2>Log in</h2>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input type="password" name="password" id="phone_number"
                            class=" @error('password') is-invalid @enderror" name="password" placeholder="password"
                            required autocomplete="new-password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group-1">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <div class="form-submit">
                            <input type="submit" name="submit" id="submit" class="submit"
                                value="{{ __('Login') }}" />
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>


            </form>
            <div class="box_login">
                <a href="{{ route('register') }}" class="back">create account --></a>
            </div>
        </div>

    </div>
</body>
