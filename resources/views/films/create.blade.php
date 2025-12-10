@extends('layout')

@section('content')
<h2>Nueva Película</h2>

<form method="POST" action="{{ route('films.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Año</label>
        <input type="number" name="release_year" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('films.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
