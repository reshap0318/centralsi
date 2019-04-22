<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('app.name') !!}</title>

    @stack('before-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/backend.css')) }}"/>
    @stack('after-styles')

</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">

                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                        <form method="POST" action="{{ route('login') }}">
                            {!! csrf_field() !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="icon-user"></i>
                                </span>
                                </div>
                                <input class="form-control" name="username" type="text" placeholder="Username">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4" type="button">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <button  class="btn btn-primary active mt-3" type="button">Register Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stack('before-scripts')
<script src="{!! asset(mix('js/manifest.js')) !!}" ></script>
<script src="{!! asset(mix('js/vendor.js')) !!}"></script>
<script src="{!! asset(mix('js/backend.js')) !!}"></script>
@stack('after-scripts')
</body>
</html>
