@extends('layouts/main')
@section('titulo', 'Actualizar Consulta')
@section('contenido')
    <h3>Actualizar consulta</h3>

    <form action="{{ route('consultas-update', $consultas->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="id_cliente">Cliente-Mascota</label>
        <select name="id_cliente" id="id_cliente" class="form-select">
            <option value="">Selecciona un cliente</option>

            @foreach ($clientes as $item)
                @if ($consultas->cliente_id == $item->id)
                <option selected value="{{ $item->id }}">
                    {{
                        $item->paterno ." ".
                        $item->materno ." ".
                        $item->nombre ." ".
                        $item->mascota
                    }}
                </option>
                @else
                <option value="{{ $item->id }}">
                    {{
                        $item->paterno ." ".
                        $item->materno ." ".
                        $item->nombre ." ".
                        $item->mascota
                    }}
                </option>
                @endif
            @endforeach

        </select>
        <label for="">Escribe el Diagnostico</label>
        <textarea name="diagnostico" id="diagnostico" class="form-control">{{ $consultas->diagnostico }}</textarea>
        <button class="btn btn-warning mt-3">Actualizar Consulta</button>
    </form>
@endsection