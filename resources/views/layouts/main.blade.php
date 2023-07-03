<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @yield('title')
        </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=url('css/app.css') ;?>">
    </head>
    <body class="antialiased">
        <header>
            <a href="#main" class="visually-hidden-focusable bg-dark fs-5 text-decoration-none text-white p-2">Ir al contenido principal</a>
            <nav class="navbar navbar-expand-lg navbar-light fs-5">
                <div class="container">
                    <img class="navbar-brand" src="<?=url('img/logo.png') ;?>" alt="Logo WebExpert" width="90" height="90">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav w-75 mx-auto d-flex justify-content-end">
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('inicio')}}">Inicio</a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('articulos')}}">Blog</a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('contratar')}}">Contratanos</a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('contacto')}}">Contacto</a>
                            </li>

                            @if(Auth::check())
                                @if(Auth::user()->rol == 1)
                                    <li class="nav-item mx-2">
                                        <a class="nav-link text-light btn btn-dark p-2 my-1" href="{{route('admin.inicio')}}">Administración</a>
                                    </li>
                                @else
                                    <li class="nav-item mx-2">
                                        <a class="nav-link text-light btn btn-dark p-2 my-1" href="{{route('compras', ['id' => Auth::user()->usuario_id])}}">Mis compras</a>
                                    </li>
                                @endif

                                <li class="nav-item mx-2">
                                    <form action="{{route('auth.logout')}}" method="post">
                                        @csrf
                                        <button class="nav-link text-light btn btn-dark p-2 my-1 w-100">Cerrar sesión ({{Auth::user()->nombre}} {{Auth::user()->apellido}})</button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-light btn btn-dark my-1" href="{{route('auth.loginForm')}}">Iniciar Sesión</a>
                                </li>

                                <li class="nav-item mx-2">
                                    <a class="nav-link text-light btn btn-dark my-1" href="{{route('auth.registroForm')}}">Registrarse</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="py-3">
                @if(Session::has('status.message'))
                    <div class="alert alert-{{Session::get('status.type') ?? 'info'}} mb-4">{!! Session::get('status.message') !!}</div>
                @endif
                @yield('main')
            </div>
        </main>

        <footer class="mt-0 p-3 text-white">
            <p class="fs-2 text-center fw-bold ">¡Seguinos en nuestras redes!</p>
            <ul class="m-0 p-2 list-unstyled text-center">
                <li class="list-inline-item"><ion-icon class="fs-1 iconos mx-2" name="logo-instagram"><a href="#"></a></ion-icon></li>
                <li class="list-inline-item"><ion-icon class="fs-1 iconos mx-2" name="logo-facebook"><a href="#"></a></ion-icon></li>
                <li class="list-inline-item"><ion-icon class="fs-1 iconos mx-2" name="logo-tiktok"><a href="#"></a></ion-icon></li>
            </ul>
        </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        @stack('js')
    </body>
</html>
