@extends('layouts/main')
@section('titulo', 'Nueva desparasitacion')
@section('contenido')
    <h3>Agregar nueva desparasitacion</h3>
    <form action="{{ route('desparasitaciones-store') }}" method="post">
        @csrf
        @method('post')
        <label for="id_cliente">Cliente-Mascota</label>
        <select name="id_cliente" id="id_cliente" class="form-select">
            <option value="">Selecciona un cliente</option>

            @foreach ($clientes as $item)
                <option value="{{ $item->id }}">
                    {{
                        $item->paterno . " " .
                        $item->materno . " " .
                        $item->nombre . " - " .
                        $item->mascota
                    }}
                </option>
            @endforeach
        </select>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        <button class="btn btn-primary mt-3">Guardar desparasitacion</button>
    </form>
@endsection