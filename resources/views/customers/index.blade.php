@extends('layout')

@section('content')
<h2>Clientes</h2>

<a class="btn btn-primary mb-3" href="{{ route('customers.create') }}">Nuevo Cliente</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre completo</th>
            <th>Email</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $c)
        <tr>
            <td>{{ $c->customer_id }}</td>
            <td>{{ $c->first_name }} {{ $c->last_name }}</td>
            <td>{{ $c->email }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('customers.show', $c->customer_id) }}">Ver</a>
                <a class="btn btn-warning btn-sm" href="{{ route('customers.edit', $c->customer_id) }}">Editar</a>

                <form action="{{ route('customers.destroy', $c->customer_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $customers->links() }}

@endsection
