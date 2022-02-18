@if (Auth::check())
    @include('home')
@else
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
        <title>{{ 'GECI | Ingreso al sistema' }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!--DataTables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

        <!--Select2-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <style>
            body{
                background-color: #f5f6fa;
            }
            .contenido {
                width: 70%;
                height: 100vh;
                margin: auto;
            }

            .display {
                font-size: 65px;
            }

            .form-login {
                width: 400px;
                margin: auto;
            }

            .form-control-custom {
                width: 100%;
                padding: 10px;
                border: none;
                background-color: #ecf0f0;
                font-weight: bold;
            }

            .footer {
                text-align: center;
                width: 100%;
                bottom: 10px;
                position: fixed;
            }

        </style>

    </head>

    <body>
        <div class="contenido">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="./"><img src="{{asset('image/banner.jpg')}}" width="200px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex justify-content-end w-100">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/register') }}">Registrarse</a>
                </div>
            </nav>
            <div class="row mx-auto" style="margin-top:15%;">
                <div class="col-md-6 mx-auto">
                    <h1 class="display">Gestión y control</h1>
                    <p>Plataforma web para la gestión y control de información de procesos académicos y administrativos
                        del programa ingeniería de sistemas <b>unisangil sede Yopal</b></p>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="form-login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3><b>Inicio de sesión</b></h3>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-12 col-form-label text-md-left">{{ __('Correo electronico *') }}</label>
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control-custom @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-12 col-form-label text-md-left">{{ __('Contraseña *') }}</label>
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control-custom @error('password') is-invalid @enderror"
                                        name="password" autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-12">
                                    <button type="submit" class="btn btn-success w-100">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center footer">Copyright &copy 2022. Todos los derechos reservados</p>

    </body>

    </html>

@endif
