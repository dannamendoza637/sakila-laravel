@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Actores</h2>
    <a href="{{ route('actors.create') }}" class="btn btn-primary">Nuevo Actor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($actors as $actor)
        <tr>
            <td>{{ $actor->actor_id }}</td>
            <td>{{ $actor->first_name }} {{ $actor->last_name }}</td>
            <td>
                <a href="{{ route('actors.show', $actor->actor_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('actors.edit', $actor->actor_id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('actors.destroy', $actor->actor_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar actor?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

