<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PQRSF-Uniautónoma del Cauca</title>
        <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles-inicio.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles-tabla.css') }}">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

            <table>
                <thead>
                    <tr>
                        <th colspan="2">
                            @if (count($informacion) > 1)
                                <label for="radicado">Seleccione el radicado para más información</label>
                                <select class="select_radicado" id="seleccionarRadicado"  name="radicado">
                                    <option value="" disabled selected>Seleccione...</option>
                                        @for ($i=0; $i < count($informacion); $i++)
                                            <option value="{{ $informacion[$i]->radicado }}">{{ $informacion[$i]->radicado }}</option>
                                        @endfor
                                    </select>
                            @else
                            <p>Información de la solicitud:</p>
                            <input type="hidden" id="radicadoUnico" value="{{$informacion[0]->radicado}}">
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="columna1">RADICADO</td>
                        <td class="columna2" id="informacionRadicado"></td>
                    </tr>
                    <tr>
                        <td class="columna1">FECHA DE SOLICITUD</td>
                        <td class="columna2" id="fechaSolicitud"></td>
                    </tr>
                    <tr>
                        <td class="columna1">Descripción de solicitud</td>
                        <td class="columna2" id="descripcionSolicitud"></td>
                    </tr>
                    <tr>
                        <td class="columna1">ESTADO</td>
                        <td class="columna2" id="estado"></td>
                    </tr>
                    <tr>
                        <td class="columna1">RESPUESTA</td>
                        <td class="columna2" id="respuesta"></td>
                    </tr>
                    <tr>
                        <td class="columna1">FECHA DE RESPUESTA</td>
                        <td class="columna2" id="fechaRespuesta"></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

