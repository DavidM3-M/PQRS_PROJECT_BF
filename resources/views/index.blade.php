<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PQRSF-Uniautónoma del Cauca</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
        <script src="js/eventos.js"></script>
    </head>
    <body>
      <header>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                      <div class="logo">
                         <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </header>
        <section>
            <div class="row">
                <div class="text-bg">
                    <h1>SISTEMA PQRSF</h1>
                    <span>Bienvenido al Sistema de Peticiones, Quejas, Reclamos, Solicitudes y Felicitaciones de la Corporación Universitaria Autónoma del Cauca.</span>
                    <span> <br></span>
                    <span>Para iniciar sesión presione aquí.</span>
                    <span>Para consultar el estado de su PRQSF presione <a style="color: blue" href="#openModal"><u>aquí</u></a></span>
                    <div id="openModal" class="modalDialog">
                        <div>
                            <a href="#close" title="Cerrar" class="close">X</a>
                            <span>Ingrese el número de radicado para consultar:</span>
                            <form action="formulario/buscarRadicado" method="POST">
                                @csrf
                                    <div class="col-md-12">
                                        <div class="form-group two-fields">
                                          <div class="input-group">
                                            <input type="search" name="numeroRadicado" class="input_search" required placeholder="&#xF002;" style="font-family: Poppins, FontAwesome">
                                            {{-- <input id="boton_buscar" class="search_btn" type="button" onclick="location.href='obtenerRadicados';" value="Buscar"> --}}
                                            <input id="boton_buscar" class="search_btn" type="submit" value="Buscar">
                                          </div>
                                        </div>
                                    </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form id="request" class="main_form" action="formulario/guardarDatos" method="POST">
                        @csrf
                        <div class="row">
                            <div class=" col-md-12" id="select">
                                <select class="input-form" id="solicitante"  name="tipoSolicitante" required>
                                    <option value="" disabled selected>Seleccione Tipo de Solicitante (Obligatorio)</option>
                                    <option value="Anonimo">Anónimo</option>
                                    <option value="Natural">Persona Natural</option>
                                    <option value="Juridica">Persona Jurídica</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <select class="input-form" id="solicitud" name="tipoSolicitud" required>
                                    <option value="" disabled selected>Seleccione el Tipo de Solicitud (Obligatorio)</option>
                                    <option value="Peticion">Petición</option>
                                    <option value="Queja">Queja</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Felicitacion">Felicitación</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group two-fields">
                                  <div class="input-group">
                                    <select class="input_desactivado2" id="tipoIdentificacion" name="tipoIdentificacion" required>
                                        <option value="" disabled selected>Tipo de documento</option>
                                        <option value="CC">Cédula de ciudadanía</option>
                                        <option value="CE">Cédula de Extranjería</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                    <input class="input_desactivado3" name="numeroIdentificacion" id="numeroIdentificacion" type="number" required placeholder="Número de documento">
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="div-nombres">
                                <input class="input_desactivado"required placeholder="Nombres y apellidos" type="type" name="nombres" id="nombre">
                            </div>
                            <div class="col-md-12">
                                <input class="input_desactivado" required placeholder="Correo electrónico" type="email" name="correo" id="email">
                            </div>
                            <div class="col-md-12">
                                <input class="input_desactivado" required placeholder="Celular" type="number" name="celular" id="telefono">
                            </div>
                            <div class="col-md-12 ">
                                <input class="input_desactivado" placeholder="Dirección de correspondencia" type="type" name="direccion" id="direccion">
                            </div>
                            <div class="col-md-12 ">
                                <input class="input_desactivado" placeholder="Ciudad y Departamento" type="type" name="ciudad" id="ciudad">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea-form-des" required placeholder="Descripción" name="descripcion" id="mensaje"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="enviarFormulario" id="enviarFormulario" onclick="enviarDatos()" class="send_btn">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </section>
   </body>
</html>

