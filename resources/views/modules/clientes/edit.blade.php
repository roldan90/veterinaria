@extends('layouts/main')
@section('titulo', 'Actualizar cliente')
@section('contenido')
    <h3>Actualizar cliente</h3>
    <form action="{{ route('clientes-update', $item->id) }}" method="post">
        @csrf
        @method('PUT')
        <h4>Cliente</h4>
        <label for="paterno">Apellido paterno</label>
        <input type="text" class="form-control" name="paterno" id="paterno" value="{{ $item->paterno }}">
        <label for="materno">Apellido materno</label>
        <input type="text" class="form-control" name="materno" id="materno" value="{{ $item->materno }}">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $item->nombre }}">
        <h4>Mascota</h4>
        <label for="mascota">Nombre de la mascota</label>
        <input type="text" class="form-control" name="mascota" id="mascota" value="{{ $item->mascota }}">
        <label for="especie">Nombre de la especie</label>
        <input type="text" class="form-control" name="especie" id="especie" value="{{ $item->especie }}">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ $item->descripcion }}</textarea>
        <button class="btn btn-warning mt-3">Actualizar cliente</button>
    </form>
@endsection