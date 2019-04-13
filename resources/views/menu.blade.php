<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css" type="text/css" />
    <title>Asistencia</title>
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css" />-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-darkness/jquery-ui.css" type="text/css" />
    <!-- temporales, borrar para producción si se soluciona el error de las modales -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" />
    <!-- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="#">CSI</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarColor03">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{route('home')}}">Inicio <span class="fa fa-home"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('movimientos')}}">Movimientos <span class="fa fa-file-alt"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('registrar')}}">Administradores <span class="fa fa-user"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('personas')}}">Personas <span class="fa fa-users"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('areas')}}">Cargos <span class="fa fa-id-card"></span></a>
                        </li>
                      </ul>
                      <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                      </form>
                        <a href="{{route('logout')}}" class="btn btn-light ml-1">Cerrar sesión</a>
                    </div>
                  </nav>
    </header>
    <div class="content">
        <div class="forms">
            @yield("content")
        </div>
        <div class="footer">
            Hecho por Sistemas Informáticos.
        </div>
    </div>
    <!--<div class="container">
        <h2>Test</h2>
    </div>-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="js/graficas.js"></script>
    <script type="text/javascript" src="js/jquery.numeric.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>