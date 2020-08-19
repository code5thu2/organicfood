<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{url('public/backend/assets')}}/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link href="{{url('public/backend/assets')}}/vendor/fonts/montserrat/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><span class="splash-description">{{ __('Please enter
                your admin information') }}</span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input name="remember" id="remember" class="custom-control-input" type="checkbox"><span class="custom-control-label" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Sign in') }}</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{url('public/backend/assets')}}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{url('public/backend/assets')}}/vendor/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="{{url('public/backend/assets')}}/libs/js/main-js.js"></script>
    @include('sweetalert::alert')
</body>

</html>