<div class="divVentanaEmergente" id="divVentanaEmergente" style="display: none; font-family:'Calibri">
    <div class="cerrarVentana">
        <button id="cerrarVentana" class="btn-cerrar-ventana" onclick="cerrarVentana()">X</button>
    </div>
    <form id="formularioRespuesta" action="/responderSolicitud" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="contenidoVentana">
        <div class="seccion seccion-superior">
            <label for="correoReceptor">Para:</label>
            <input class="inputs-ventana" type="text" name="correoReceptor" id="correoReceptor" required readonly>
        </div>
        <div class="seccion seccion-media">
            <label for="correoReceptor">Asunto:</label>
            <input class="inputs-ventana" type="text" name="asunto" id="asunto" required readonly>
        </div>
        <div class="col-md-12">
            <textarea class="input-respuesta" required  name="inputRespuesta" id="inputRespuesta"></textarea>
            <p style="color: blue; " id="nombreAdjuntoRespuesta"></p>
        </div>
        <button type="submit" id="enviarRespuesta" class="btn-enviar-respuesta">Enviar</button>
        <a style="color: gray; text-decoration: none;" onclick="document.getElementById('archivoRespuesta').click()" title="Adjuntar archivo"><i class="fa fa-paperclip"></i></a>
        <input type="file" name="archivoRespuesta" id="archivoRespuesta" style="display: none;" />
    </form>


