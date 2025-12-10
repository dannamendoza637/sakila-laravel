@extends('layout')

@section('content')
<h2>Detalle de Película</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $film->film_id }}</li>
    <li class="list-group-item"><strong>Título:</strong> {{ $film->title }}</li>
    <li class="list-group-item"><strong>Año:</strong> {{ $film->release_year }}</li>
    <li class="list-group-item"><strong>Descripción:</strong> {{ $film->description }}</li>
</ul>

<a href="{{ route('films.index') }}" class="btn btn-secondary mt-3">Regresar</a>
@endsection
