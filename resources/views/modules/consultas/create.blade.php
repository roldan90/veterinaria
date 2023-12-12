@extends('layouts/main')
@section('titulo', 'Nueva Consulta')
@section('contenido')
    <h3>Agregar nueva consulta</h3>

    <form action="{{ route('consultas-store') }}" method="post">
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
        <label for="">Escribe el Diagnostico</label>
        <textarea name="diagnostico" id="diagnostico" class="form-control"></textarea>
        <button class="btn btn-primary mt-3">Guardar Consulta</button>
    </form>
@endsection