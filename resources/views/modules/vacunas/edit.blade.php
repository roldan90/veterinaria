@extends('layouts/main')
@section('titulo', 'Actualizar vacuna')
@section('contenido')
    <h3>Actualizar vacuna</h3>
    <form action="{{ route('vacunas-update', $vacunas->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="id_cliente">Cliente-Mascota</label>
        <select name="id_cliente" id="id_cliente" class="form-select">
            <option value="">Selecciona un cliente</option>
            @foreach ($clientes as $item)
                @if ($vacunas->cliente_id == $item->id)
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
        <label for="">Descripcion</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ $vacunas->descripcion }}</textarea>
        <button class="btn btn-warning mt-3">Actualizar Vacuna</button>
    </form>
@endsection