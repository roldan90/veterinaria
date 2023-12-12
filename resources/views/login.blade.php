@extends('layouts/login')

@section('contenido')
    <div class="container">
        <div class="row mt-4">
            <div class="col"></div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Sistema de veterinaria</h3>
                        <hr>
                        <form action="{{ route('logear') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                              <label for="name" class="form-label">Usuario</label>
                              <input type="text" class="form-control" id="name" name="name" required>
                              <div id="emailHelp" class="form-text">Nunca compartas tu cuenta con nadie!</div>
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Entrar al sistema</button>
                        </form>
                    </div>
                  </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection