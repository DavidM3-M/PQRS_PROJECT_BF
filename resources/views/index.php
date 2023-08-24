<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PQRSF - UNIAUTÓNOMA</title>
        <link rel='stylesheet' href='css/styles-inicio.css'>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <style>
            /* Estilos para el encabezado */
            header {
                background-color: #00498B;
                color: white;
                /* text-align: left; */
                /* padding: 1rem; */
            }


            /* Estilos para el logo */
            #logo {
                width: 150px; /* Ajusta el ancho según tus necesidades */
                height: auto; /* El alto se ajustará automáticamente según el ancho */
                text-align: center;
            }

            #texto{
                display: inline-block;
                vertical-align: top;
            }







            /* Importación de fuentes de google fonts */
    @import url(https://fonts.googleapis.com/css?family=Noto+Sans);


    body{
    height: 100%;
    font-family: 'Noto Sans', sans-serif;
    background-color: #fbfbfb;
    }

    .content {
            width: 70%;
            margin: 0 auto; /* Márgenes automáticos para centrar horizontalmente */
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);


        }

    input{
    background-color: #fbfbfb;
    width: 608px;
    height: 40px;
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    border-color: #00c3f8 ;
    margin-top: 10px;
    padding-left: 10px;
    margin-bottom: 20px;
    }


    textarea{
    background-color: #fbfbfb;
    width: 70%;
    height: 200px;
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    border-color: #00c3f8;
    margin-top: 10px;
    margin-left: 150px;
    padding-left: 20px;
    margin-bottom: 20px;
    padding-top: 15px;
    text-align: left;
    }


    label{
    display: block;
    float: center;
    }


    button{
    height: 50px;
    padding-left: 5px;
    padding-right: 5px;
    margin-bottom: 20px;
    margin-top: 10px;
    margin-left: 600px;
    text-transform: uppercase;
    background-color: #000080;
    border-color: #0e0e0e;
    border-style: solid;
    border-radius: 10px;
    width: 100px;
    cursor: pointer;
    justify-content: center;
    }


    button p{
    color: #fbfbfb;
    font-size: 15px;
   text-align: center;
    }


    span{
    color: #ab4493;
    }


    #aviso{
    font-size: 13px;
    color: #0e0e0e;
    }


    h1{
    font-size: 39px;
    text-align: center;
    padding-bottom: 20px;
    color: #00498B;
    }


    h3{
    font-size: 16px;
    text-align: center;
    padding-bottom: 30px;
    color: #0e0e0e;
    }


    p{
    font-size: 14px;
    color: #0e0e0e;
    }


    ::-webkit-input-placeholder {
    color: #a8a8a8;
    }


    ::-webkit-textarea-placeholder {
    color: #a8a8a8;
    }


    #formulario input:focus{
    outline:0;
    border: 1px solid #97d848;
    }


    .formulario textarea:focus{
    outline:0;
    border: 1px solid #97d848;
    }

    select{
    background-color: #fbfbfb;
    width: 608px;
    height: 40px;
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    border-color: #00c3f8 ;
    margin-top: 10px;
    padding-left: 10px;
    margin-bottom: 20px;
    }
    td {
        padding: 16px;
    }
    .centered-label {
        text-align: center;
        font-size: 20px;
    }

    </style>

    <body>

        <!-- Encabezado con logo -->
        <header>
            <img id="logo" src="img/logoAut1.png">
            <h2 id="texto">REGISTRO DE PETICIONES QUEJAS, RECLAMOS, SUGERENCIAS Y FELICITACIONES - CORPORACIÓN UNIVERSITARIA AUTÓNOMA DEL CAUCA</h2>
        </header>
            <div>

            </div>
        <!-- formulario de contacto en html y css -->

        <div class="content">

            <div class="formulario">
                <h1>Formulario de PQRSF</h1>
                <h3>Escríbenos y en breve nos pondremos en contacto contigo</h3>
                <form action="submeter-formulario.php" method="post">
                    <table>

                        <tr>
                            <p>
                                <td>
                                    </select> <label for="selectOption">Tipo de solicitante:
                                    <span class="obligatorio">*</span></label>
                                    <select id="selectOption" name="selectOption" required="obligatorio">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="opcion1">Anónimo</option>
                                    <option value="opcion2">Persona Natural</option>
                                    <option value="opcion3">Persona Jurídica</option>
                                </td>
                            </p>
                            <p>
                                <td>
                                    </select> <label for="selectOption">Tipo de solicitud:
                                    <span class="obligatorio">*</span></label>
                                    <select id="selectOption" name="selectOption" required="obligatorio">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="opcion1">Petición</option>
                                    <option value="opcion2">Queja</option>
                                    <option value="opcion3">Reclamo</option>
                                    <option value="opcion3">Sugerencia</option>
                                    <option value="opcion3">Felicitación</option>
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="nombre" class="colocar_nombre">Nombres
                                    <span class="obligatorio">*</span></label>
                                    <input type="text" name="introducir_nombre" id="nombre" required="obligatorio" placeholder="Escribe tus nombres">
                                </td>
                            </p>
                            <p>
                                <td><label for="nombre" class="colocar_nombre">Apellidos
                                    <span class="obligatorio">*</span></label>
                                    <input type="text" name="introducir_apellido" id="nombre" required="obligatorio" placeholder="Escribe tus apellidos">
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="telefone" class="colocar_telefono">Teléfono
                                    <span class="obligatorio">*</span></label>
                                    <input type="tel" name="introducir_telefono" id="telefono" placeholder="Escribe tu teléfono">
                                </td>
                            </p>
                            <p>
                                <td><label for="email" class="colocar_email">Correo electrónico
                                    <span class="obligatorio">*</span></label>
                                    <input type="email" name="introducir_email" id="email" required="obligatorio" placeholder="Escribe tu correo electrónico">
                                </td>
                            </p>
                        </tr>

                        <tr>
                            <p>
                                <td><label for="direccion" class="colocar_direccion">Dirección de correspondencia</label>
                                    <input type="text" name="introducir_direccion" id="direccion" placeholder="Escribe tu dirección">
                                </td>
                            </p>
                            <p>
                                <td><label for="ciudad" class="colocar_ciudad">Ciudad y departamento</label>
                                    <!-- <span class="obligatorio">*</span></label> -->
                                    <input type="text" name="introducir_ciudad" id="ciudad" placeholder="Escribe tu ciudad y departamento">
                                </td>
                            </p>
                        </tr>

                    </table>

                        <p>
                        <label for="mensaje" class="centered-label">Mensaje
                            <span class="obligatorio">*</span></label>
                            <textarea name="introducir_mensaje" class="texto_mensaje" id="mensaje" required="obligatorio" placeholder="Deja aquí tu comentario..."></textarea>
                        </p>

                        <button color type="submit" name="enviar_formulario" id="enviar"><p>Enviar</p></button>

                        <p class="aviso">
                        <span class="obligatorio"> * </span>los campos son obligatorios.
                        </p>
                </form>
            </div>
        </div>
    </body>
</html>



