<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PQRSF - UNIAUTÓNOMA</title>
        {{-- <link rel='stylesheet' href='css/styles-inicio.css'> --}}
        <link rel="stylesheet" href="{{ asset('css/styles-inicio.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js">;</script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        <script src="{{ asset('js/eventos.js') }}"></script>
    </head>

    <body>
        <header>
            <img id="logo" src="img/logoAut1.png">
            <h2 id="texto">REGISTRO DE PETICIONES QUEJAS, RECLAMOS, SUGERENCIAS Y FELICITACIONES - CORPORACIÓN UNIVERSITARIA AUTÓNOMA DEL CAUCA</h2>
        </header>
        <div class="content">
            <div class="formulario">
                <h1>Formulario de PQRSF</h1>
                <h3>Escríbenos y en breve nos pondremos en contacto contigo</h3>
                <!-- <form action="submeter-formulario.php" method="post"> -->
                <form action="formulario/guardarDatos" method="POST">
                {{-- <form action="{{ route('formulario.guardar.datos') }}" method="POST"> --}}
                    @csrf
                    <table>
                        <tr>
                            <p>
                                <td>
                                    </select> <label for="selectOption">Tipo de solicitante:
                                    <span class="obligatorio">*</span></label>
                                    <select id="solicitante" name="tipoSolicitante" required="obligatorio">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="Anonimo">Anónimo</option>
                                    <option value="Natural">Persona Natural</option>
                                    <option value="Juridica">Persona Jurídica</option>
                                </td>
                            </p>
                            <p>
                                <td>
                                    </select> <label for="selectOption">Tipo de solicitud:
                                    <span class="obligatorio">*</span></label>
                                    <select id="solicitud" name="tipoSolicitud" required="obligatorio">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="Peticion">Petición</option>
                                    <option value="Queja">Queja</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Felicitacion">Felicitación</option>
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="nombre" class="colocar_nombre">Nombres
                                    <span class="obligatorio">*</span></label>
                                    <input type="text" name="nombres" id="nombre" required="obligatorio" placeholder="Escribe tus nombres">
                                </td>
                            </p>
                            <p>
                                <td><label for="nombre" class="colocar_nombre">Apellidos
                                    <span class="obligatorio">*</span></label>
                                    <input type="text" name="apellidos" id="apellido" required="obligatorio" placeholder="Escribe tus apellidos">
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="telefone" class="colocar_telefono">Teléfono
                                    <span class="obligatorio">*</span></label>
                                    <input type="tel" name="celular" id="telefono" placeholder="Escribe tu teléfono">
                                </td>
                            </p>
                            <p>
                                <td><label for="email" class="colocar_email">Correo electrónico
                                    <span class="obligatorio">*</span></label>
                                    <input type="email" name="correo" id="email" required="obligatorio" placeholder="Escribe tu correo electrónico">
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="direccion" class="colocar_direccion">Dirección de correspondencia</label>
                                    <input type="text" name="direccion" id="direccion" placeholder="Escribe tu dirección">
                                </td>
                            </p>
                            <p>
                                <td><label for="ciudad" class="colocar_ciudad">Ciudad y departamento</label>
                                    <input type="text" name="ciudad" id="ciudad" placeholder="Escribe tu ciudad y departamento">
                                </td>
                            </p>
                        </tr>

                    </table>

                        <p>
                        <label for="mensaje" class="centered-label">Mensaje
                            <span class="obligatorio">*</span></label>
                            <textarea name="descripcion" class="texto_mensaje" id="mensaje" required="obligatorio" placeholder="Deja aquí tu comentario..."></textarea>
                        </p>

                        <button color type="submit" name="enviarFormulario" id="enviarFormulario" onclick="enviarDatos()"> <p>Enviar</p>
                        </button>

                        <p class="aviso">
                        <span class="obligatorio"> * </span>Los campos son obligatorios.
                        </p>
                </form>
            </div>
        </div>
    </body>
</html>



