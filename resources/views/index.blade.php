<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PQRSF-Uniautónoma del Cauca</title>
        <link rel="icon" href="images/logoU.ico">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles-inicio.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/eventos.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <header class="header">
            <div class="left-div">
                <div class="logo">
                    <img src="images/logoAut1.png" alt="Uniautonoma" class="header-image">
                </div>
            </div>
            <div class="right-div">
                <h1 class="header-title">SISTEMA DE PQRSF - UNIAUTÓNOMA DEL CAUCA</h1>
            </div>
        </header>
        <form class="formulario" id="formularioSolicitud" action="/enviarSolicitud" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="column">
                    <div class=" col-md-12" id="select">
                        <label for="solicitante">Tipo de solicitante</label>
                        <select class="input_form" id="solicitante"  name="tipoSolicitante" required>
                            <option value="Seleccione" disabled selected>Seleccione...</option>
                            <option value="Anonimo">Anónimo</option>
                            <option value="Natural">Persona Natural</option>
                            <option value="Juridica">Persona Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="tipoUsuario">Tipo de usuario</label>
                        <select class="input_form" id="tipoUsuario"  name="tipoUsuario" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Egresado">Egresado</option>
                            <option value="Acudiente">Padre de Familia o Acudiente</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Docente">Docente</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                            <label for="solicitud">Tipo de solicitud</label>
                            <select class="input_form" id="solicitud" name="tipoSolicitud" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Petición">Petición</option>
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                                <option value="Felicitación">Felicitación</option>
                            </select>
                    </div>
                    <div class="col-md-12" id="divTipoIdentificacion" style="display: none">
                        <label for="tipoIdentificacion">Tipo de identificación</label>
                        <select class="input_form" id="tipoIdentificacion" name="tipoIdentificacion" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="NIT">NIT</option>
                        </select>
                    </div>
                    <div class="col-md-12" id="divNumeroIdentificacion" style="display: none">
                        <label for="numeroIdentificacion" id="labelIdentificacion"></label>
                        <input class="input_form" name="numeroIdentificacion" id="numeroIdentificacion" type="number" required>
                    </div>
                    <div class="col-md-12" id="divNombres" style="display: none">
                        <label for="nombre" id="labelNombres"></label>
                        <input class="input_form"required  type="text" name="nombres" id="nombre" oninput="convertirAMayusculas(this)">
                    </div>
                    <div class="col-md-12" id="divCorreo" style="display: none">
                        <label for="email">Correo electrónico</label>
                        <input class="input_form" required type="email" name="correo" id="email" oninput="convertirAMinusculas(this)">
                    </div>
                </div>
                <div class="column">

                    <div class="col-md-12" id="divCelular" style="display: none">
                        <label for="telefono">Celular</label>
                        <input class="input_form" required type="number" name="celular" id="telefono">
                    </div>
                    <div class="col-md-12" id="divCheck" style="display: none">
                        <p>¿Desea respuesta en físico</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="respuestaFisica" id="checkedSi" value="SI">
                            <label class="form-check-label" for="checkedSi">Sí</label>
                        </div>
                        <div class="form-check form-check-inline" style="padding-bottom:30px">
                            <input class="form-check-input" type="radio" name="respuestaFisica" id="checkedNo" checked value="NO">
                            <label class="form-check-label" for="checkedNo">No</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="mensaje">Descripción</label>
                        <textarea class="textarea-anonimo" required  name="descripcion" id="mensaje"></textarea>
                    </div>
                    <div class="col-md-12">
                        <p style="font-size: 13px;"><a style="color: blue; text-decoration: none; cursor: pointer;" onclick="document.getElementById('archivoInput').click()" title="Adjuntar archivo"><u>Adjuntar archivos</u></a> (Tamaño máximo: 3 MB)</p>
                        <p style="color: green; font-size: 12px" id="archivoCargado"></p>
                        <input type="file" name="archivoInput" id="archivoInput" style="display: none;">
                    </div>
                    <div class="col-md-12" style="padding-top:10px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <span style ="background-color:white; font-size: 13px;">Autorizo el tratamiento de mis datos a la Universidad Uniautónoma. <a style="color: black;" href="https://www.uniautonoma.edu.co/sites/default/files/inline/resolucion_no._0186_politica_de_tratamiento_de_datos_personales_de_los_titulares.pdf" target="_blank"><u style="color: blue" >Ver política</u></a></span>
                          </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="enviarFormulario" id="enviarFormulario" class="send_btn">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="container2">
            <div class="column2">
                <span style="background-color:white">Para consultar el estado de su PRQSF presione <a style="color: blue" href="/buscar-radicado"><u>aquí</u></a></span>
            </div>
            <div class="column3">
                <span style="color: blue; background-color:white"> <a href="/login"><u>Iniciar sesión</u></a></span>
            </div>
        </div>
    </body>
</html>

