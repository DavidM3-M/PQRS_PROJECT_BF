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
            <table class="tabla1">
                <tr>
                    <th colspan="2">
                        <label for="radicado">Seleccione la solicitud para más información</label>
                        <select class="select_radicado" id="seleccionarRadicado">
                            <option value="{{$informacion[0]->radicado}}">{{ $informacion[0]->radicado }}</option>
                            @if (count($informacion) > 1)
                                @for ($i=0; $i < count($informacion); $i++)
                                    <option value="{{ $informacion[$i]->radicado }}">{{ $informacion[$i]->radicado }}</option>
                                @endfor
                            @endif
                        </select>
                    </th>
                </tr>
                @if ()

                @endif
                <tr>
                    <td class="columna1">RADICADO</td>
                    <td id="informacionRadicado" class="columna2"></td>
                </tr>
                <tr>
                    <td class="columna1">FECHA DE SOLICITUD</td>
                    <td class="columna2">{{$informacion[0]->created_at}}</td>
                </tr>
                <tr>
                    <td class="columna1">ESTADO</td>
                    <td class="columna2">{{$informacion[0]->estado}}</td>
                </tr>
                <tr>
                    <td class="columna1">RESPUESTA</td>
                    <td class="columna2">{{$informacion[0]->respuesta}}</td>
                </tr>
                <tr>
                    <td class="columna1">FECHA DE RESPUESTA</td>
                    <td class="columna2">{{$informacion[0]->updated_at}}</td>
                </tr>
                {{-- <tr>
                    <td>Fila 6, Celda 1</td>
                    <td class="columna2">Fila 6, Celda 2</td>
                </tr> --}}
            </table>
        </div>

        <script>
            var datosEnJavaScript = @json($informacion);
        </script>

    </body>
</html>

