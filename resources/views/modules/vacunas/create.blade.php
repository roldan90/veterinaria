@extends('layouts/main')
@section('titulo', 'Nueva vacuna')
@section('contenido')
    <h3>Agregar nueva vacuna</h3>
    <form action="{{ route('vacunas-store') }}" method="post">
        @csrf
        @method('POST')
        <label for="id_cliente">Cliente-Mascota</label>
        <select name="id_cliente" id="id_cliente" class="form-select" required>
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
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        <button class="btn btn-primary mt-3">Guardar Vacuna</button>
    </form>
@endsection