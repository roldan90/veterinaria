@extends('layouts/main')
@section('titulo', 'Vacunas')
@section('contenido')
    <h3 class="text-center">Vacunas</h3>
    <a href="{{ route('vacunas-create') }}" class="btn btn-primary">
        Nueva Vacuna
    </a>
    <hr>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Vacuna</th>
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
                <td>{{$item->fecha }}</td>
                <td>
                    <a href="{{ route('vacunas-edit', $item->id_vacuna) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('vacunas-destroy', $item->id_vacuna) }}" method="POST">
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