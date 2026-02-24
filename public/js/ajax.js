 // public/js/ajax.js


 $(function() {
    $('#buscar').click(function() {
        let datoIngresado = $('#dato').val();

        $.ajax({
            url: '/listarRadicados',
            method: 'POST',
            data: {
                datoIngresado:datoIngresado,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
        }).done(function(res){
            let informacion = JSON.parse(res);
            if(informacion.length > 0) {

                if(informacion[0].tipoSolicitante === "Anonimo") {

                    document.getElementById('informacionRadicado').innerHTML = informacion[0].radicado;
                    document.getElementById('fechaSolicitud').innerHTML = informacion[0].created_at_formatted;
                    document.getElementById('tipoSolicitud').innerHTML = informacion[0].tipoSolicitud;
                    document.getElementById('estado').innerHTML = informacion[0].estado;
                    document.getElementById('descripcionSolicitud').innerHTML = informacion[0].descripcion;
                    if (informacion[0].estado === "SIN RESPUESTA" || informacion[0].estado === 'Asignada') {
                        document.getElementById('fechaRespuesta').innerHTML = "";
                    }else{
                        document.getElementById('fechaRespuesta').innerHTML = informacion[0].updated_at_formatted;
                    }
                    document.getElementById('respuesta').innerHTML = informacion[0].respuesta;
                    document.getElementById('dato').value = '';
                    var div = document.getElementById('miDiv');
                    div.style.display = 'none';
                }else {

                    if(informacion.length ===  1) {

                        document.getElementById('informacionRadicado').innerHTML = informacion[0].radicado;
                        document.getElementById('fechaSolicitud').innerHTML = informacion[0].created_at_formatted;
                        document.getElementById('tipoSolicitud').innerHTML = informacion[0].tipoSolicitud;
                        document.getElementById('estado').innerHTML = informacion[0].estado;
                        document.getElementById('descripcionSolicitud').innerHTML = "Información privada";
                        if (informacion[0].estado === "SIN RESPUESTA" || informacion[0].estado === 'Asignada') {
                            document.getElementById('fechaRespuesta').innerHTML = "";
                            document.getElementById('respuesta').innerHTML = "SIN RESPUESTA";
                        }else{
                            document.getElementById('fechaRespuesta').innerHTML = informacion[0].updated_at_formatted;
                            document.getElementById('respuesta').innerHTML = "Respuesta enviada al correo: " + informacion[0].correo;
                        }

                        document.getElementById('dato').value = '';
                        var div = document.getElementById('miDiv');
                        div.style.display = 'none';
                    }
                    else {
                        var div = document.getElementById('miDiv');
                        div.style.display = 'block';
                        var selectRadicado = document.getElementById('seleccionarRadicado');
                        for (var i = 0; i < informacion.length; i++) {
                            var opcion = document.createElement('option');
                            opcion.text = informacion[i].radicado;
                            selectRadicado.add(opcion);
                            if (i === 0) {
                                opcion.selected = true;
                            }
                        }
                        document.getElementById('informacionRadicado').innerHTML = informacion[0].radicado;
                        document.getElementById('fechaSolicitud').innerHTML = informacion[0].created_at_formatted;
                        document.getElementById('tipoSolicitud').innerHTML = informacion[0].tipoSolicitud;
                        document.getElementById('estado').innerHTML = informacion[0].estado;
                        document.getElementById('descripcionSolicitud').innerHTML = informacion[0].descripcion;
                        document.getElementById('respuesta').innerHTML = informacion[0].respuesta;
                        document.getElementById('dato').value = '';
                        if (informacion[0].estado === "SIN RESPUESTA" || informacion[0].estado === 'Asignada') {
                            document.getElementById('respuesta').innerHTML = "SIN RESPUESTA";
                            document.getElementById('fechaRespuesta').innerHTML = "";
                        }else {
                            document.getElementById('respuesta').innerHTML = "Respuesta enviada al correo: " + informacion[0].correo;
                            document.getElementById('fechaRespuesta').innerHTML = informacion[0].updated_at_formatted;
                        }
                    }
                }

            }else {
                document.getElementById('informacionRadicado').innerHTML = "";
                document.getElementById('fechaSolicitud').innerHTML = "";
                document.getElementById('tipoSolicitud').innerHTML = "";
                document.getElementById('estado').innerHTML = "";
                document.getElementById('descripcionSolicitud').innerHTML = "";
                document.getElementById('respuesta').innerHTML = "";
                document.getElementById('fechaRespuesta').innerHTML = "";
                document.getElementById('dato').value = '';
                var div = document.getElementById('miDiv');
                div.style.display = 'none';
            }
        });
    });
});


$(function() {
    $('#seleccionarRadicado').click(function() {
        var radicado = $('#seleccionarRadicado').val();
        $.ajax({
            url: '/mostrarInformacion',
            method: 'POST',
            data: {
                radicado:radicado,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
        }).done(function(res){
            let informacion = JSON.parse(res);
            document.getElementById('informacionRadicado').innerHTML = informacion[0].radicado;
            document.getElementById('fechaSolicitud').innerHTML = informacion[0].created_at_formatted;
            document.getElementById('tipoSolicitud').innerHTML = informacion[0].tipoSolicitud;
            document.getElementById('estado').innerHTML = informacion[0].estado;
            document.getElementById('descripcionSolicitud').innerHTML = "Informacion privada";
            document.getElementById('respuesta').innerHTML =  "Informacion privada";
            if (informacion[0].estado === "SIN RESPUESTA" || informacion[0].estado === 'Asignada') {
                document.getElementById('respuesta').innerHTML = "SIN RESPUESTA";
                document.getElementById('fechaRespuesta').innerHTML = "";
            }else {
                document.getElementById('respuesta').innerHTML = "Respuesta enviada al correo: " + informacion[0].correo;
                document.getElementById('fechaRespuesta').innerHTML = informacion[0].updated_at_formatted;
            }
        });
    });
});

$(function() {
    $('#emailInput').change(function() {
        var email = $('#emailInput').val();

        $.ajax({
            url: '/validarCorreo',
            method: 'POST',
            data: {
                email:email,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
        }).done(function(res){
            let correos = JSON.parse(res);

            if (correos[0].existe) {

                document.getElementById('mensajeExiste').innerHTML = "El correo ya está en uso";
                var campo = document.getElementById("emailInput");
                valor = campo.value;
                var partes = valor.split('@');
                campo.value = partes[0];

            }else{

                document.getElementById('mensajeExiste').innerHTML = "";

            }
        });
    });
});

$(function() {
    $('#emailInput').keyup(function() {
        var email = $('#emailInput').val();

        $.ajax({
            url: '/validarCorreo',
            method: 'POST',
            data: {
                email:email,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
        }).done(function(res){
            let correos = JSON.parse(res);
            if (correos[0].existe) {
                document.getElementById('mensajeExiste').innerHTML = "El correo ya está en uso";
                var campo = document.getElementById("emailInput");
                valor = campo.value;
                var partes = valor.split('@');
                campo.value = partes[0];

            }else{

                document.getElementById('mensajeExiste').innerHTML = "";
            }
        });
    });
});


$(document).ready(function() {
    $("form#formularioSolicitud").submit(function(event) {
        event.preventDefault();
        // var form  = $("#formularioSolicitud").attr("action");
        // var datosFormulario = $("#formularioSolicitud").serialize();
        var datosFormulario = new FormData(this);
        var tipoSolicitante = document.getElementById('solicitante').value;
        var email =  document.getElementById('email').value;

        $.ajax({
            type:'POST',
            url:'/enviarSolicitud',
            data:datosFormulario,
            success:function(res){
                Swal.fire({
                    title: 'Su solicitud fue enviada',
                    text: 'Radicado: '+ res.radicado,
                    icon: 'success',
                    showConfirmButton: true,
                    timer: 30000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open("inicio", "_self");
                    }

                $("#formularioSolicitud")[0].reset();
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });

        $.ajax({
            type:'POST',
            url:'/enviarCorreo',
            data: {
                email:email,
                tipoSolicitante:tipoSolicitante,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
        });
    });
});


//Funciones de la ventana emergente para registrar la respuesta.

$(document).ready(function() {
    $("form#formularioRespuesta").submit(function(event) {
        event.preventDefault();
        var inputRespuesta = document.getElementById('inputRespuesta').value.trim();
        var correoReceptor = document.getElementById("correoReceptor").value.trim();
        var asunto = document.getElementById("asunto").value.trim();

        var datosFormulario = new FormData(this);
        if(inputRespuesta !== "" && correoReceptor !== "" && asunto !== "") {
            $.ajax({
                type:'POST',
                url:'/responderSolicitud',
                data:datosFormulario,
                success:function(res){
                    if(res.respuesta === "Guardada"){
                        var texto = "guardada."
                    }else{
                        var texto = "guardada y enviada al correo electrónico."
                    }
                    document.getElementById("divVentanaEmergente").style.display = "none";
                    Swal.fire({
                        icon: 'success',
                        title: '¡Perfecto!',
                        text: 'La respuesta fue ' + texto,
                        timer: 30000,
                        timerProgressBar: true,
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open("lista-solicitudes", "_self");
                        }
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Faltan algunos datos por diligenciar.',
                timer: 30000,
                timerProgressBar: true,
                showConfirmButton: true,
                timer: 180000,
                timerProgressBar: true,
                allowOutsideClick: false,
                }).then((result) => {

            });
        }
    });
});






