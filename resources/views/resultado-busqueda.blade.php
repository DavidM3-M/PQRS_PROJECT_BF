<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Buscar-Solicitud</title>
        <link rel="icon" href="images/logoU.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles-inicio.css">
        <link rel="stylesheet" href="css/styles-tabla.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <header class="header">
            <div class="left-div">
                <div class="logo">
                    <a href="/inicio"><img src="images/logoAut1.png" alt="Uniautonoma" class="header-image"></a>
                </div>
            </div>
            <div class="right-div">
                <h1 class="header-title">SISTEMA DE PQRSF - UNIAUTÓNOMA DEL CAUCA</h1>
            </div>
        </header>


        <div class="container">
            <nav class="navbar navbar-light  justify-content-between" style="background-color: #ffff; font-family:Helvetica">
                <a class="" style="color: blue; font-family: Poppins, FontAwesome" href="inicio" class="navbar-brand"><i class="fa-solid fa-arrow-left"></i><u>Atrás</u></a>
                <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <label for="buscar">Ingrese el radicado o número de documento de identidad:&nbsp;&nbsp;&nbsp;</label>
                <form class="form-inline">
                    @csrf
                    <input name="radicadoIdentificacion" id="dato" class="form-control mr-sm-2" type="search" required placeholder="Ingrese..." aria-label="Search">
                    <button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="button">Buscar</button>
                </form>
            </nav>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">
                            <div id="miDiv" style="display: none;">
                                <label for="radicado">Seleccione el radicado para más información</label>
                                <select class="select_radicado" id="seleccionarRadicado"  name="radicado">
                                    <option value="" disabled selected>Seleccione...</option>
                                </select>
                            </div>
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
                        <td class="columna1">TIPO DE SOLICITUD</td>
                        <td class="columna2" id="tipoSolicitud"></td>
                    </tr>
                    <tr>
                        <td class="columna1">ESTADO</td>
                        <td class="columna2" id="estado"></td>
                    </tr>
                    <tr>
                        <td class="columna1">Descripción de solicitud</td>
                        <td class="columna2" id="descripcionSolicitud"></td>
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

