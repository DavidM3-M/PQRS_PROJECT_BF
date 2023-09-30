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
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/eventos.js"></script>
    </head>
    <body>
        <header class="header">
            <div class="left-div">
                <div class="logo">
                    <img src="images/logoAut1.png" alt="Imagen de encabezado" class="header-image">
                </div>
            </div>
            <div class="right-div">
                <h1 class="header-title">SISTEMA DE PQRSF - UNIAUTÓNOMA DEL CAUCA</h1>
            </div>
        </header>
        <form id="request" action="formulario/guardarDatos" method="POST">
            @csrf
            <div class="container">
                <div class="column">
                    <div class=" col-md-12" id="select">
                        <label for="tipoSolicitante">Tipo de solicitante</label>
                        <select class="input_form" id="solicitante"  name="tipoSolicitante" required>
                            <option value="Seleccione" disabled selected>Seleccione...</option>
                            <option value="Anonimo">Anónimo</option>
                            <option value="Natural">Persona Natural</option>
                            <option value="Juridica">Persona Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                            <label for="tipoSolicitud">Tipo de solicitud</label>
                            <select class="input_form" id="solicitud" name="tipoSolicitud" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Peticion">Petición</option>
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                                <option value="Felicitacion">Felicitación</option>
                            </select>
                    </div>
                    <div class="col-md-12">
                        <label for="tipoIdentificacion">Tipo de identificación</label>
                        <select class="input_desactivado" id="tipoIdentificacion" name="tipoIdentificacion" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="numeroIdentificacion">Número de identificación</label>
                        <input class="input_desactivado" name="numeroIdentificacion" id="numeroIdentificacion" type="number" required>
                    </div>
                    <div class="col-md-12">
                        <label for="nombres">Nombres y apellidos</label>
                        <input class="input_desactivado"required  type="text" name="nombres" id="nombre">
                    </div>
                    <div class="col-md-12">
                        <label for="correo">Correo electrónico</label>
                        <input class="input_desactivado" required type="email" name="correo" id="email">
                    </div>
                </div>
                <div class="column">
                    <div class="col-md-12">
                        <label for="celular">Celular</label>
                        <input class="input_desactivado" required type="number" name="celular" id="telefono">
                    </div>
                    <div class="col-md-12 ">
                        <label for="direccion">Dirección</label>
                        <input class="input_desactivado"  type="text" name="direccion" id="direccion">
                    </div>
                    <div class="col-md-12 ">
                        <label for="ciudad">Ciudad</label>
                        <input class="input_desactivado" type="text" name="ciudad" id="ciudad">
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripción</label>
                        <textarea class="textarea-form-des" required  name="descripcion" id="mensaje"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="enviarFormulario" id="enviarFormulario" onclick="enviarDatos()" class="send_btn">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="container2">
            <div class="column2">
                <span>Para consultar el estado de su PRQSF presione <a style="color: blue" href="#openModal"><u>aquí</u></a></span>
                <div id="openModal" class="modalDialog">
                    <div class="modalContent">
                        <a href="#close" title="Cerrar" class="close">X</a>
                        <span>Ingrese el radicado o número de identificación:</span>
                        <form action="mostrarInformacion" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group two-fields">
                                    <div class="input-group">
                                        <input type="number" name="radicadoIdentificacion" class="input_search" required placeholder="&#xF002;"style="font-family: Poppins, FontAwesome">
                                        <button class="search_btn" type="submit">BUSCAR</button>
                                        {{-- <input type="search" name="numeroRadicado" class="input_search" required placeholder="&#xF002;"style="font-family: Poppins, FontAwesome"> --}}
                                        {{-- <input id="boton_buscar" class="search_btn" type="button" onclick="location.href='obtenerRadicados';" value="Buscar"> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column3">
                <span style="color: blue">Iniciar sesión</span>
            </div>
        </div>

    </body>
</html>

