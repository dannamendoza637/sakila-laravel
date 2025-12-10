@extends('layout')

@section('content')
<h2>Tiendas</h2>

<a href="{{ route('stores.create') }}" class="btn btn-primary mb-3">Nueva tienda</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Manager</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr>
            <td>{{ $store->store_id }}</td>
            <td>{{ $store->manager->first_name ?? '' }} {{ $store->manager->last_name ?? '' }}</td>
            <td>{{ $store->address->address ?? '' }}</td>
            <td>
                <a href="{{ route('stores.show', $store->store_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('stores.edit', $store->store_id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('stores.destroy', $store->store_id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
