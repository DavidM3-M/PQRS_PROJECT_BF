

function abrirVentanaRespuesta(boton) {
    var fila = boton.parentElement.parentElement;
    var correo = fila.querySelector("td:first-child").textContent;
    var radicado = fila.querySelector("td:nth-child(2)").textContent;
    var inputCorreoReceptor = document.getElementById('correoReceptor');
    var asunto = document.getElementById('asunto');
    document.getElementById("divVentanaEmergente").style.display = "block";

    if (correo !== "") {
        inputCorreoReceptor.value = correo;
        asunto.value = "Respuesta a solicitud con radicado # " + radicado + ".";
    }else{
        inputCorreoReceptor.value = "Solicitud anónima"
        asunto.value = "Respuesta a solicitud con radicado # " + radicado + ".";
    }

}

function asignarSolicitud(boton) {
    var fila = boton.parentElement.parentElement;
    var radicado = fila.querySelector("td:nth-child(2)").textContent;
    $('#modal-asignar').modal('show');
    var tituloModal = document.getElementById('tituloModal');
    var radicadoModal = document.getElementById('radicadoModal');
    tituloModal.innerHTML = "Asignar solicitud # " + radicado;
    radicadoModal.value = radicado
    // document.getElementById("divVentanaEmergente").style.display = "block";



}


function verDescripcion(boton) {
    var fila = boton.parentElement.parentElement;
    var radicado = fila.querySelector("td:nth-child(2)").textContent;
    $.ajax({
        url: '/descripcion-solicitud',
        type: 'GET',
        data: { radicado: radicado },
        success: function(response) {
            
            // $('#contenedorDeVista').html(response);
            var nuevaVentana = window.open('', '_blank');
            nuevaVentana.document.open();
            nuevaVentana.document.write(response);
            nuevaVentana.document.close();
        },
        error: function() {
            console.log('Hubo un error al cargar la vista.');
        }
    });

}


function cerrarVentana() {
    document.getElementById("divVentanaEmergente").style.display = "none";
    var mensaje = document.getElementById("nombreAdjuntoRespuesta");
    var archivoAdjunto = document.getElementById("archivoRespuesta");
    mensaje.textContent = '';
    archivoAdjunto.value = "";
    mensaje.classList.remove('nombre-adjunto-respuesta');
}


document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("archivoRespuesta").addEventListener("change", function() {
        var archivoAdjunto = document.getElementById("archivoRespuesta");
        var enlace = document.createElement("a");
        var icono = document.createElement("i");
        var archivoSeleccionado = archivoAdjunto.files[0];
        var nombreArchivo = archivoSeleccionado.name;
        var mensaje = document.getElementById("nombreAdjuntoRespuesta");
        var extension = nombreArchivo.split('.').pop();
        var extensionesPermitidas = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xlsx', 'zip', 'rar'];
        if (extensionesPermitidas.includes(extension.toLowerCase())) {
            mensaje.textContent = nombreArchivo + '   ';
            mensaje.classList.add('nombre-adjunto-respuesta');
            enlace.href = "javascript:eliminarArchivoAdjunto()";
            icono.className = "fa fa-times-circle delete";
            icono.title = "Quitar adjunto";
            enlace.appendChild(icono);
            mensaje.appendChild(enlace);
        } else {
            mensaje.textContent = extension + ', no es una extensión permitida';
            archivoAdjunto.value = "";
            mensaje.classList.remove('nombre-adjunto-respuesta');
        }

    });
});

function eliminarArchivoAdjunto() {
    document.getElementById('archivoRespuesta').value = "";
    document.getElementById('nombreAdjuntoRespuesta').innerHTML = "";
    var mensaje = document.getElementById("nombreAdjuntoRespuesta");
    mensaje.classList.remove('nombre-adjunto-respuesta');
}

