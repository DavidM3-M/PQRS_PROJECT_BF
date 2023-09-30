<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PQRSF-Uniautónoma del Cauca</title>
        <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles-inicio.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles-tabla.css') }}">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/eventos.js"></script>
    </head>
    <body>
        <header class="header">
            <div class="left-div">
                <div class="logo">
                    <a href="index.php"><img src="images/logoAut1.png" alt="logoUniautonoma" class="header-image"></a>
                </div>
            </div>
            <div class="right-div">
                <h1 class="header-title">SISTEMA DE PQRSF - UNIAUTÓNOMA DEL CAUCA</h1>
            </div>
        </header>
        <div class="container">
            <table class="tabla2">
                <thead>
                    <tr>
                        <th>N° de Radicado</th>
                        <th>Tipo de solicitud</th>
                        <th>Tipo de solicitud</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informacion as $info)
                        <tr>
                            <td>{{ $info->radicado }}</td>
                            <td>{{ $info->tipoSolicitud }}</td>
                            <td>{{  \Carbon\Carbon::parse($info->created_at)->format('d/m/y') }}</td>
                            {{-- <td><input name="radicado" type="button" value="{{ $info->radicado }}" id="miBoton"></td> --}}
                            <td>
                                <ul>
                                    <li data-id="1">Opción 1</li>
                                    <li data-id="2">Opción 2</li>
                                    <!-- Agrega más elementos a la lista según sea necesario -->
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

