@extends('layout')

@section('content')
<h2>Editar Película</h2>

<form method="POST" action="{{ route('films.update', $film) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" value="{{ $film->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control">{{ $film->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Año</label>
        <input type="number" name="release_year" class="form-control" value="{{ $film->release_year }}">
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('films.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
