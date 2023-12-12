@extends('layouts/main')
@section('titulo', 'Consultas')
@section('contenido')
    <h3 class="text-center">Expediente Veterinario - {{ $cliente->mascota }}</h3>
   
    <p>
        Dueño : {{ 
                    $cliente->paterno ." ". 
                    $cliente->materno ." ". 
                    $cliente->nombre
                }}
    </p>
    <h3>Consultas</h3>
    <table class="table">
        <thead>
            <th>Diagnostico</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($consultas as $item)
            <tr>
                <td>{{ $item->diagnostico }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Vacunas</h3>
    <table class="table">
        <thead>
            <th>Descripcion</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($vacunas as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <h3>Desparasitaciones</h3>
    <table class="table">
        <thead>
            <th>Descripcion</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($desparasitaciones as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection