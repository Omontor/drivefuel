<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Fuel</title>
    <link rel="stylesheet" type="text/css" href="/logtemplate/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/logtemplate/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="/logtemplate/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="/logtemplate/css/iofrm-theme19.css">
</head>
<body>
    <div class="form-body without-side">


        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="/img/3.png" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                                    <a href="/">
          
                    <img class="logo-size" src="/img/logo.png" alt="" style="width: 300px; padding: 30px;">
              
            </a>
            <hr>
                        <h3>Formulario de acceso</h3>
                        <p>Ingresa tus credenciales para accesar a <strong>Drive Fuel</strong></p>
                      <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <center>
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                        </center>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <center>
                            <button type="submit" class="btn btn-success px-4">
                                {{ trans('global.login') }}
                            </button>
                            </center>
                        </div>
                        <hr>
                        <div class="col-12 text-center" >
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}" style="color: green;">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif

                        </div>
                    </div>
                </form>
                        <!-- reenable para registro
                        <div class="page-links">
                            <a href="register19.html">Register new account</a>
                        </div>
                    -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/logtemplate/js/jquery.min.js"></script>
<script src="/logtemplate/js/popper.min.js"></script>
<script src="/logtemplate/js/bootstrap.min.js"></script>
<script src="/logtemplate/js/main.js"></script>
</body>
</html>
              
