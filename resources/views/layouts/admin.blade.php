<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            @yield('title')
        </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="<?=url('css/admin.css') ;?>">
    </head>
    <body>
        <header>
            <a href="#main" class="visually-hidden-focusable bg-dark fs-5 text-decoration-none text-white p-2">Ir al contenido principal</a>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient text-light">
                <div class="container-fluid">
                    <img class="navbar-brand" src="<?=url('img/logo.png') ;?>" alt="Logo WebExpert" width="60" height="60">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-light p-2" href="{{route('admin.inicio')}}">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light p-2" href="{{route('admin.articulos')}}">Artículos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light p-2" href="{{route('admin.usuarios')}}">Usuarios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light p-2" href="{{route('inicio')}}">Volver al inicio</a>
                            </li>

                            <li class="nav-item mx-2">
                                <form action="{{route('auth.logout')}}" method="post">
                                    @csrf
                                    <button class="btn btn-dark p-2">Cerrar sesión ({{Auth::user()->nombre}} {{Auth::user()->apellido}})</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container py-3" id="main">
            @if(Session::has('status.message'))
                <div class="alert alert-{{Session::get('status.type') ?? 'info'}} mb-4">{!! Session::get('status.message') !!}</div>
            @endif
            @yield('main')
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>