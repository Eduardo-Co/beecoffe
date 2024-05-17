<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<style>
  nav{
    background-color: #010141 !important;
    margin-bottom: 50px;
  }
  .nav-link-main {
      color: white !important;
  }
  .nav-link-sub {
      color: black !important;
  }
  img{
    width: 150px;
    height: 100px;
  }
  @media screen and (min-width: 768px) {
        img{
          margin-right: 100px;
        }
  }

</style>
<body>
  <nav class="navbar navbar-expand-lg">
    <img src="{{asset('img/image.png')}}">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav justify-content-between">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link-main" href="#" id="navbarDropdownMedico" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Médico
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMedico">
                    <a class="dropdown-item nav-link-sub" href="{{route('medicos.create')}}">Adicionar Médico</a>
                    <a class="dropdown-item nav-link-sub" href="{{ route('medicos.dashboard') }}">Listar Médicos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link-main" href="#" id="navbarDropdownPaciente" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Paciente
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownPaciente">
                    <a class="dropdown-item nav-link-sub" href="{{route('pacientes.create')}}">Adicionar Paciente</a>
                    <a class="dropdown-item nav-link-sub" href="{{ route('pacientes.dashboard') }}">Listar Pacientes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link-main" href="#" id="navbarDropdownAtendimento" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Atendimento
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownAtendimento">
                    <a class="dropdown-item nav-link-sub" href="{{route('atendimentos.create')}}">Adicionar Atendimento</a>
                    <a class="dropdown-item nav-link-sub" href="{{ route('atendimentos.dashboard') }}">Listar Atendimentos</a>
                </div>
            </li>
        </ul>
    </div>
  </nav>
   @yield('content')
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
