<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Descargar solicitud</title>
        <link rel="icon" href="images/logoU.ico">
    </head>

    <body>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" style="padding-bottom:40px;text-align:center">Información de la solicitud con radicado {{ $datos->radicado }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 20%">Tipo de solicitante:</td>
                    @if ($datos->tipoSolicitante == "Anonimo")
                        <td>Anónimo</td>
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
            </tbody>
        </table>
        <p style="padding-top:40px; text-align:center; "> <strong>DESCRIPCIÓN</strong></p>
        <p style="padding-top: 20px;  text-align:justify">{{ $datos->descripcion}}</p>
    </body>
</html>

