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
        <span class="menu-icon"><i class="fas fa-bars"></i></span>
        <p>CIS (Control de Ingresos y Salidas)</p>
    </header>
    <div class="content">
        <div class="menu">
            <div class="line"><ul><li id="home"><i id="ihome" class="fa fa-home active"></i><font class="active">Inicio</font></li></ul></div>
            <div class="line"><ul><li id="movement"><i id="imovement" class="fas fa-file-alt"></i><font>Movimiento</font></li></ul></div>
            <div class="line"><ul><li id="users"><i id="iusers" class="fas fa-user"></i><font>Usuarios</font></li></ul></div>
            <div class="line"><ul><li id="people"><i id="ipeople" class="fas fa-users"></i><font>Personas</font></li></ul></div>
            <div class="line"><ul><li id="positions"><i id="ipositions" class="fas fa-id-card"></i><font>Cargos</font></li></ul></div>
        </div>
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