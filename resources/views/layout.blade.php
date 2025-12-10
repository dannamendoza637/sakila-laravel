<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sakila Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Sakila Dashboard</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="{{ route('films.index') }}">Películas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Clientes</a></li>

                <li class="nav-item"><a class="nav-link" href="{{ route('actors.index') }}">Actores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('languages.index') }}">Idiomas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rentals.index') }}">Alquileres</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('payments.index') }}">Pagos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('stores.index') }}">Tiendas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('staff.index') }}">Staff</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('inventory.index') }}">Inventario</a></li>

                <li class="nav-item"><a class="nav-link" href="{{ route('reports.top-customers') }}">Reportes</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
