@extends('layouts/main')
@section('titulo', 'Desparastación')
@section('contenido')
    <h3 class="text-center">Desparastación</h3>
    <a href="{{ route('desparasitaciones-create') }}" class="btn btn-primary">
        Nueva desparasitación
    </a>
    <hr>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Descripcion</th>
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
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->fecha }}</td>
                <td>
                    <a href="{{ route('desparasitaciones-edit', $item->id_desparasitacion) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('desparasitaciones-destroy', $item->id_desparasitacion) }}" method="POST">
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