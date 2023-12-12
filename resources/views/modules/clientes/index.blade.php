@extends('layouts/main')
@section('titulo', 'Clientes')
@section('contenido')
    <h3 class="text-center">Clientes</h3>
    <a href="{{ route('clientes-create') }}" class="btn btn-primary">
        Nuevo Cliente
    </a>
    <hr>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Apellido paterno del cliente</th>
                <th>Apellido materno del cliente</th>
                <th>Nombre del cliente</th>
                <th>Nombre de la mascota</th>
                <th>Especie de la mascota</th>
                <th>Descripcion</th>
                <th>Expediente</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->paterno }}</td>
                <td>{{ $item->materno }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->mascota }}</td>
                <td>{{ $item->especie }}</td>
                <td>{{ $item->descripcion }}</td>
                <td class="text-center">
                    <a href="{{ route('clientes-expediente', $item->id) }}" class="btn btn-success">
                        Ver
                    </a>
                </td>
                <td>
                    <a href="{{ route('clientes-edit', $item->id) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('clientes-destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection