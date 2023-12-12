<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Veterinaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('clientes-index') }}">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('consultas-index') }}">Consulta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('vacunas-index') }}">Vacunas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('desparasitaciones-index') }}">Desparasitación</a>
          </li>
          
          <li class="nav-item" >
            <a style="color: red" class="nav-link active" href="{{ route('logout') }}" tabindex="-1" aria-disabled="true">Salir</a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>