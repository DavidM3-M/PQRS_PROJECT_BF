<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Lista - Solicitudes</title>
        <link rel="icon" href="images/logoU.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles-lista-solicitudes.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/gestion-solicitudes.js"></script>
        <script src="js/ajax.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-light" style="background-color: #00498B; height:60px">
            <div class="left-section">
                <form class="d-flex">
                    {{-- <input class="form-control me-2" style="margin-right:10px" type="search" placeholder="Bucar por radicado" aria-label="Search"> --}}
                    {{-- <button class="btn-buscar-listado" type="submit">Buscar</button> --}}
                    <a style="color: white; padding-right:10px" href="/estadisticas" title="Ver estadísticas" target="_blank">Ver estadísticas</a>
                    @if (auth()->user()->id == 1)
                        <a style="color: white; padding-right:10px" href="/gestionar-usuario" title="Ver estadísticas" target="_blank">Gestionar usuario</a>
                    @endif
                </form>
            </div>
            <div class="right-section">
                <span style="color: white; padding-right:20px">{{ auth()->user()->name }}</span>
                <a style="color: white; padding-right:10px" href="/logout" title="Cerrar Sesión"><i class="fas fa-sign-in-alt"></i></a>
            </div>
        </nav>

        <div class="container" id="contenedorDeVista">
            @if (session('success'))
                <div class="alert alert-success alert-custom" id="success-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        $('#success-alert').fadeOut();
                    }, 3000);
                </script>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: white; border-radius:10px;">
                        <tr>
                            <th style="display: none">CORREO</th>
                            <th>RADICADO</th>
                            <th>FECHA DE RECEPCIÓN</th>
                            <th>TIPO DE SOLICITUD</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ESTADO</th>
                            <th>FECHA DE VENCIMIENTO</th>
                            <th>FECHA DE RESPUESTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td style="display: none">{{ $solicitud->correo }}</td>
                                <td>{{ $solicitud->radicado}}</td>
                                <td>{{ Carbon\Carbon::parse($solicitud->created_at)->format('d/M/Y') }}</td>
                                <td>{{ $solicitud->tipoSolicitud}}</td>
                                <form>
                                @csrf
                                    <td><button type="button" id="botonVerRespuesta" class="btn-responder"  onclick="verDescripcion(this)"><u style="color: #4d94b1">Ver solicitud</u></button></td>
                                </form>
                                @if ($solicitud->estado == "SIN RESPUESTA")
                                    <td><button class="btn-responder"  onclick="asignarSolicitud(this)">Sin respuesta&nbsp;&nbsp;&nbsp;<i style="color: #da4a07" title="Asignar" class="fa fa-share" aria-hidden="true"></i></button></td>
                                    <td>{{ Carbon\Carbon::parse($solicitud->fechaVencimiento)->format('d/M/Y') }}</td>
                                    <td></td>
                                @elseif ($solicitud->estado == "Asignada")
                                <td><button class="btn-responder"  onclick="abrirVentanaRespuesta(this)">Asignada&nbsp;&nbsp;&nbsp;<i style="color: #00498B" title="Responder" class="fa fa-envelope" aria-hidden="true"></i></button></td>
                                <td>{{ Carbon\Carbon::parse($solicitud->fechaVencimiento)->format('d/M/Y') }}</td>
                                <td></td>
                                @else
                                    <td style="padding-left: 15px;">{{ $solicitud->estado }}&nbsp;&nbsp;&nbsp;<i style="color: green" class="fas fa-check"></i></td>
                                    <td>{{ Carbon\Carbon::parse($solicitud->fechaVencimiento)->format('d/M/Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($solicitud->updated_at)->format('d/M/Y') }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('modal-asignar')
            </div>
            <div class="table-responsive">
                <div class="d-flex justificy-content-end">
                    {{ $solicitudes->links() }}
                </div>
            </div>
            @include('responder-solicitud')
        </div>
    </body>
</html>

