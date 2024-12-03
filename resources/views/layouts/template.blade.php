<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gatitos</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <div class="container">
                <a class="navbar-brand" href="/">Gatitos cariñositos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mascotas">Mascotas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/servicios">servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/citas">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/adopta">Adopta una mascota</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <router-outlet></router-outlet>
    </div>
    @yield('content') @section('content')
    <footer class="mt-5">
        <div class="card text-center">
            <div class="card-header">
                Dios los cría y ellos se juntan
            </div>
            <div class="card-body">
                <h5 class="card-title">Gatitos Cariñositos</h5>
                <p>© 2024 Landing de Gatitos. Todos los derechos reservados.</p>
                <a href="/adoptar" class="btn btn-primary">Adopta</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>

</html>