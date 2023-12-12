@extends('layouts/main')
@section('titulo', 'Consultas')
@section('contenido')
    <h3 class="text-center">Consultas</h3>
    <a href="{{ route('consultas-create') }}" class="btn btn-primary">
        Nueva Consulta
    </a>
    <hr>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Diagnostico</th>
                <th>Fecha</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->paterno . " " . $item->materno . " " . $item->nombre }}</td>
                <td>{{ $item->mascota }}</td>
                <td>{{ $item->diagnostico }}</td>
                <td>{{ $item->fecha }}</td>
                <td>
                    <a href="{{ route('consultas-edit', $item->id_consulta) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('consultas-destroy', $item->id_consulta) }}" method="POST">
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