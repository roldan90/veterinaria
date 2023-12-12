@extends('layouts/main')
@section('titulo', 'Nuevo cliente')
@section('contenido')
    <h3>Agregar nuevo cliente</h3>
    <form action="{{ route('clientes-store') }}" method="post">
        @csrf
        @method('POST')
        <h4>Cliente</h4>
        <label for="paterno">Apellido paterno</label>
        <input type="text" class="form-control" name="paterno" id="paterno">
        <label for="materno">Apellido materno</label>
        <input type="text" class="form-control" name="materno" id="materno">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
        <h4>Mascota</h4>
        <label for="mascota">Nombre de la mascota</label>
        <input type="text" class="form-control" name="mascota" id="mascota">
        <label for="especie">Nombre de la especie</label>
        <input type="text" class="form-control" name="especie" id="especie">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        <button class="btn btn-primary mt-3">Guardar cliente</button>
    </form>
@endsection