<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
    <title>{{ 'GECI | Registrarse' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


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
            width: 550px;
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
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/login') }}">Login</a>
            </div>
        </nav>
        <div class="row mx-auto" style="margin-top: 5%">
            <div class="col-md-5 mx-auto">
                <h1 class="display">Registro nuevos usuarios</h1>
                <p>Plataforma web para la gestión y control de información de procesos académicos y administrativos
                    del programa ingeniería de sistemas <b>unisangil sede Yopal</b></p>
            </div>
            <div class="col-md-7 mx-auto">
                <div class="form-login">
                    <form action="/usuario" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_tipo_documento"
                                    class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                                <div class="col-md-12">
                                    <select class="js-example-placeholder-single form-control-custom @error('per_tipo_documento') is-invalid @enderror"
                                        name="per_tipo_documento" id="per_tipo_documento">
                                        <option value="">---- SELECCIONE ----</option>
                                        @foreach ($tiposdocumentos as $tiposdocumento)
                                            <option value="{{ $tiposdocumento->id }}">{{ $tiposdocumento->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('per_tipo_documento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="per_numero_documento"
                                    class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                                <div class="col-md-12">
                                    <input id="per_numero_documento" type="number"
                                        class="form-control-custom @error('per_numero_documento') is-invalid @enderror"
                                        name="per_numero_documento" value="{{ old('per_numero_documento') }}"
                                        autocomplete="per_numero_documento" autofocus>
                                    @error('per_numero_documento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_nombre"
                                    class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                                <div class="col-md-12">
                                    <input id="per_nombre" type="text"
                                        class="form-control-custom @error('per_nombre') is-invalid @enderror"
                                        name="per_nombre" value="{{ old('per_nombre') }}" autocomplete="per_nombre"
                                        autofocus>
                                    @error('per_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="per_apellido"
                                    class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                                <div class="col-md-12">
                                    <input id="per_apellido" type="text"
                                        class="form-control-custom @error('per_apellido') is-invalid @enderror"
                                        name="per_apellido" value="{{ old('per_apellido') }}"
                                        autocomplete="per_apellido" autofocus>
                                    @error('per_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_telefono"
                                    class="col-md-12 col-form-label">{{ __('Telefono *') }}</label>
                                <div class="col-md-12">
                                    <input id="per_telefono" type="number"
                                        class="form-control-custom @error('per_telefono') is-invalid @enderror"
                                        name="per_telefono" value="{{ old('per_telefono') }}"
                                        autocomplete="per_telefono" autofocus>
                                    @error('per_telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email"
                                    class="col-md-12 col-form-label">{{ __('Correo electronico *') }}</label>
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password"
                                    class="col-md-12 col-form-label">{{ __('Contraseña *') }}</label>
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control-custom @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" autocomplete="password"
                                        autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm"
                                    class="col-md-12 col-form-label">{{ __('Confirmar contraseña *') }}</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control-custom"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_id_departamento"
                                    class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                                <div class="col-md-12">
                                    <select class="js-example-placeholder-single form-control-custom @error('per_id_departamento') is-invalid @enderror"
                                        name="per_id_departamento" id="per_id_departamento">
                                        <option value="">---- SELECCIONE ----</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">
                                                {{ $departamento->dep_nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('per_id_departamento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="per_id_municipio"
                                    class="col-md-12 col-form-label">{{ __('Municipio o sede *') }}</label>
                                <div class="col-md-12">
                                    <select class="js-example-placeholder-single form-control-custom @error('per_id_municipio') is-invalid @enderror"
                                        name="per_id_municipio" id="per_id_municipio">
                                        <option value="">---- SELECCIONE ----</option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->id }}">{{ $municipio->mun_nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('per_id_municipio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="per_tipo_usuario"
                                    class="col-md-12 col-form-label">{{ __('Tipo de usuario *') }}</label>
                                <div class="col-md-12">
                                    <select class="js-example-placeholder-single form-control-custom @error('per_tipo_usuario') is-invalid @enderror"
                                        name="per_tipo_usuario" id="per_tipo_usuario">
                                        <option value="">---- SELECCIONE ----</option>
                                        @foreach ($tipousuarios as $tipousuario)
                                            <option value="{{ $tipousuario->id }}">{{ $tipousuario->rol_nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('per_tipo_usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0 mx-auto">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success w-100">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p class="footer">Copyright &copy 2022. Todos los derechos reservados</p>
    <script src="{{ asset('js/jquery.js') }}"></script>

</body>

</html>
