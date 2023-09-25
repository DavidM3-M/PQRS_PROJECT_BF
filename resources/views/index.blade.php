<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>PQRSF-Uniautónoma del Cauca</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      {{-- <link rel="stylesheet" href="css/responsive.css"> --}}
      <!-- fevicon -->
      {{-- <link rel="icon" href="images/fevicon.png" type="image/gif" /> --}}
      <!-- Scrollbar Custom CSS -->
      {{-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> --}}
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> --}}
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
      <script src="js/eventos.js"></script>


   </head>
   <!-- body -->
   {{-- <body class="main-layout"> --}}
    <body>
      <!-- loader  -->
      <!-- <div class="loader_bg"> -->
         <!-- <div class="loader"><img src="images/loading.gif" alt="#" /></div> -->
      <!-- </div> -->
      <!-- end loader -->

      <!-- header -->
      <header>
         <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                      <div class="logo">
                         <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                      </div>
                    </div>
                    {{-- <div class="col-md-8 col-sm-8">
                        <div class="right_bottun">
                            <ul class="conat_info d_none ">
                                <li><a href="#"><i class="fa fa-user" style="color:blue" aria-hidden="true" title="Iniciar sesión" tooltip-dir="left"></i></a></li>
                                <li><a href="#"><i class="fa fa-search" style="color:blue" aria-hidden="true" ></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-8">
                        <input class="input_desactivado" required placeholder="Celular" type="number" name="celular" id="telefono">
                    </div> --}}
                </div>
            </div>
        </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
        <section>
            <div class="row">
               {{-- <div class="col-md-1 col-lg-1"></div> --}}
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
                            <form action="../../form-result.php" method="post" target="_blank">
                                    <div class="col-md-12">
                                        <div class="form-group two-fields">
                                          <div class="input-group">
                                            <input type="search" name="buscarRadicado" class="input_search" placeholder="&#xF002;" style="font-family: Poppins, FontAwesome">
                                            <input class="search_btn" type="submit" value="Buscar">
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
                                <!-- <span class="obligatorio">*</span></label> -->
                                <select class="input-form" id="solicitante"  name="tipoSolicitante" required>
                                    <option value="" disabled selected>Seleccione Tipo de Solicitante (Obligatorio)</option>
                                    <option value="Anonimo">Anónimo</option>
                                    <option value="Natural">Persona Natural</option>
                                    <option value="Juridica">Persona Jurídica</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <!-- <span class="obligatorio">*</span></label> -->
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
                                    <input name="numeroIdentificacion" id="numeroIdentificacion" type="number" required class="input_desactivado3" placeholder="Número de documento">
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
      <!-- end contact section -->
      <!--  footer -->
      {{-- <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Calle 5 No. 3-85 Popayán, Colombia <br>
                        </li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>PBX: (602) 8222295</li>
                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>Whatsapp: 314 639 5495</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p><a href="https://www.uniautonoma.edu.co/"> Página Corporación Universitaria Autónoma del Cauca</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer> --}}
      <!-- end footer -->
      <!-- Javascript files-->
      {{-- <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script> --}}
   </body>
</html>

