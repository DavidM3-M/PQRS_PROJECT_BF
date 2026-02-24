<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Descripción - Solicitud</title>
        <link rel="icon" href="images/logoU.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles-lista-solicitudes.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-light" style="background-color: #00498B;">
            <div class="left-section">
            </div>
            <div class="right-section">
                <span style="color: white; padding-right:20px">{{ auth()->user()->name }}</span>
                <a style="color: white; padding-right:10px" href="/logout" title="Cerrar Sesión"><i class="fas fa-sign-in-alt"></i></a>
            </div>
        </nav>

        <div class="container">
            <div class="table-responsive">
                <form action="/descargarSolicitud" method="GET">
                    <table class="table">
                        <thead style="background: skyblue; width: 30%;">
                            <tr>
                                <th colspan="2">Información de la solicitud con radicado {{ $datos->radicado }}</th>
                                <input type="hidden" name="radicado" value="{{ $datos->radicado }}">
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 20%">Tipo de solicitante:</td>
                                @if ($datos->tipoSolicitante == "Anonimo")
                                    <td>Anónima</td>
                                @elseif ($datos->tipoSolicitante == "Juridica")
                                    <td>Persona Jurídica</td>
                                @else
                                    <td>Persona Natural</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Tipo de solicitud:</td>
                                <td>{{ $datos->tipoSolicitud }}</td>
                            </tr>
                            <tr>
                                <td>Fecha de envío:</td>
                                <td>{{ Carbon\Carbon::parse($datos->created_at)->format('d/M/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Fecha de vencimiento:</td>
                                <td>{{ Carbon\Carbon::parse($datos->fechaVencimiento)->format('d/M/Y') }}</td>
                            </tr>
                            <tr>
                                <td>Área:</td>
                                <td>{{ $datos->area}}</td>
                            </tr>
                            <tr>
                                <td>Fecha de asignación:</td>
                                <td>{{ Carbon\Carbon::parse($datos->fechaAsignacion)->format('d/M/Y') }}</td>
                            </tr>
                            @if ($datos->tipoSolicitante != "Anonimo")
                                <tr>
                                    <td>Documento:</td>
                                    <td>{{ $datos->tipoIdentificacion . " - " . $datos->numeroIdentificacion }}</td>
                                </tr>
                                <tr>
                                    <td>Nombres:</td>
                                    <td>{{ $datos->nombres }}</td>
                                </tr>
                                <tr>
                                    <td>Correo:</td>
                                    <td>{{ $datos->correo }}</td>
                                </tr>
                                <tr>
                                    <td>Celular:</td>
                                    <td>{{ $datos->celular}}</td>
                                </tr>
                                <tr>
                                    <td>Respuesta física:</td>
                                    <td>{{ $datos->respuestaFisica}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Descripción:</td>
                                <td>{{ $datos->descripcion}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <td><button class="btn btn-primary" style="margin: 10px 0; ">Descargar pdf</button></td>

                </form>
                <form action="/descargarArchivosAdjuntos" method="GET">
                    <input type="hidden" name="radicadoA" value="{{ $datos->radicado }}">
                    @if (!is_null($datos->rutaAdjunto))
                        <td>
                            <button class="btn btn-primary" style="margin: 10px 0; ">Descargar archivos adjuntos</button>
                        </td>
                        </tr>
                        </table>
                    @else
                        </tr>
                        </table>
                    @endif
                </form>
            </div>
        </div>
    </body>
</html>

