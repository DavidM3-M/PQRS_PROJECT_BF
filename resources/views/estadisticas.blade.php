<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Estadísticas</title>
        <link rel="icon" href="images/logoU.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles-estadisticas.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/eventos-estadisticas.js"></script>

    </head>
<body>
    </head>

    <body>
        <nav class="navbar navbar-light" style="background-color: #00498B; height:60px">
            <div class="left-section"></div>
            <div class="right-section">
                <span style="color: white; padding-right:20px">{{ auth()->user()->name }}</span>
                <a style="color: white; padding-right:10px" href="/logout" title="Cerrar Sesión"><i class="fas fa-sign-in-alt"></i></a>
            </div>
        </nav>

        <div class="contenedor">
            <div class="izquierda">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="mb-5 mt-5 text-center">Rango de Fechas </h2>
                        <form class="form-inline">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fechaInicio">Desde</label>
                                    <input type="date" id="fechaInicio" class="form-control" name="fechaInicio" value="" min="2023-11-01"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fechaFin">Hasta</label>
                                    <input type="date" id="fechaFin" class="form-control" name="fechaFin" value=""/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="derecha">
                <div class="table-responsive">
                    <table class="table" style="text-align: center">
                            <tr>
                                <th colspan="5" style="background-color: #6fa2b9; border: white solid 1px; border-radius:10px;">SOLICITUDES POR TIPO DE SOLICITANTE</th>
                            </tr>
                            <tr>
                                <td>SOLICITUDES ANÓNIMAS</td>
                                <td>SOLICITUDES PERSONA NATURAL</td>
                                <td>SOLICITUDES PERSONA JURÍDICA</td>
                                <td>TOTAL</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td id="anonimas"></td>
                                <td id="natural"></td>
                                <td id="juridica"></td>
                                <td id="total"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="5" style="background-color: #6fa2b9; border: white solid 1px; border-radius:10px;">SOLICITUDES POR TIPO DE SOLICITUD</th>
                            </tr>
                            <tr>
                                <td>PETICIONES</td>
                                <td>QUEJAS</td>
                                <td>RECLAMOS</td>
                                <td>SUGERENCIAS</td>
                                <td>FELICITACIONES</td>
                            </tr>
                            <tr>
                                <td id="peticiones"></td>
                                <td id="quejas"></td>
                                <td id="reclamos"></td>
                                <td id="sugerencias"></td>
                                <td id="felicitaciones"></td>
                            </tr>
                            <tr>
                                <th colspan="5" style="background-color: #6fa2b9; border: white solid 1px; border-radius:10px;">SOLICITUDES POR TIPO DE USUARIO</th>
                            </tr>
                            <tr>
                                <td>ESTUDIANTE</td>
                                <td>EGRESADO</td>
                                <td>PADRE DE FAMILIA O ACUDIENTE</td>
                                <td>ADMINISTRATIVO</td>
                                <td>OTRO</td>
                            </tr>
                            <tr>
                                <td id="estudiante"></td>
                                <td id="egresado"></td>
                                <td id="acudiente"></td>
                                <td id="administrativo" ></td>
                                <td id="otro"></td>
                            </tr>
                            <tr>
                                <th colspan="5" style="background-color: #6fa2b9; border: white solid 1px; border-radius:10px;">SOLICITUDES POR GESTIÓN</th>
                            </tr>
                            <tr>
                                <td>SOLICITUDES RECIBIDAS EN EL RANGO DE FECHAS</td>
                                <td Colspan="2">SOLICITUDES EN ESTADO ASIGNADA EN EL RANGO DE FECHAS</td>
                                <td>SOLICITUDES SIN ASIGNAR EN EL RANGO DE FECHAS</td>
                                <td>SOLICITUDES RESPONDIDAS EN EL RANGO DE FECHAS</td>
                            </tr>
                            <tr>
                                <td id="recibidas" ></td>
                                <td colspan="2" id="asignada" ></td>
                                <td id="sinAsignar"></td>
                                <td id="respondida"></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
