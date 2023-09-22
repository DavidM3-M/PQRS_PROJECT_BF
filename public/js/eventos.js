


    function validarFormulario(campos) {
        var vacio = campos.length;

        for (var i = 0; i < campos.length; i++) {
            if (campos[i] === '') {
                vacio--;
            }
        }

        if(vacio != campos.length){
            return false;
        }


    }

    function enviarDatos() {

        solicitante = document.getElementById('solicitante').value;
        console.log(solicitante)
        if(solicitante === "Anonimo"){
            var campos = [
                document.getElementById('solicitante').value,
                document.getElementById('solicitud').value,
                document.getElementById('mensaje').value
            ];
        }else{

            var campos = [
                document.getElementById('solicitante').value,
                document.getElementById('solicitud').value,
                document.getElementById('tipoIdentificacion').value,
                document.getElementById('numeroIdentificacion').value,
                document.getElementById('nombre').value,
                document.getElementById('telefono').value,
                document.getElementById('email').value,
                document.getElementById('mensaje').value
            ];
        }

        var validacion = validarFormulario(campos)

        if(validacion != false){
            Swal.fire(
                'SOLICITUD ENVIADA',
                '',
                'success'
              )
        }
    }


    document.addEventListener("DOMContentLoaded", function() {
        var seleccion = document.getElementById("solicitante");
        var solicitud = document.getElementById("solicitud");
        var tipoIdentificacion = document.getElementById("tipoIdentificacion");
        const numeroIdentificacion = document.getElementById("numeroIdentificacion");
        const nombre = document.getElementById("nombre");
        const telefono = document.getElementById("telefono");
        const email = document.getElementById("email");
        const ciudad = document.getElementById("ciudad");
        const direccion = document.getElementById("direccion");
        const mensaje = document.getElementById("mensaje");

        seleccion.addEventListener("change", function() {

            nombre.value = "";
            telefono.value = "";
            email.value = "";
            ciudad.value = "";
            direccion.value = "";
            solicitud.value = "";
            mensaje.value = "";
            tipoIdentificacion.value = "";
            numeroIdentificacion.value = "";


            if (seleccion.value === "Anonimo") {
                tipoIdentificacion.classList.add('input_desactivado2');
                numeroIdentificacion.classList.add('input_desactivado3');
                nombre.classList.add('input_desactivado');
                telefono.classList.add('input_desactivado');
                email.classList.add('input_desactivado');
                direccion.classList.add('input_desactivado');
                ciudad.classList.add('input_desactivado');
                mensaje.classList.remove('textarea-form-des');
                mensaje.classList.add('textarea-form');
                // nombre.disabled = true;
                // telefono.disabled = true;
                // email.disabled = true;
                // direccion.disabled = true;
                // ciudad.disabled = true;
                tipoIdentificacion.required = false;
                numeroIdentificacion.required = false;
                nombre.required = false;
                telefono.required = false;
                email.required = false;

            } else if (seleccion.value === "Natural" || seleccion.value === "Juridica") {
                tipoIdentificacion.classList.remove('input_desactivado2');
                numeroIdentificacion.classList.remove('input_desactivado3');
                nombre.classList.remove('input_desactivado');
                telefono.classList.remove('input_desactivado');
                email.classList.remove('input_desactivado');
                direccion.classList.remove('input_desactivado');
                ciudad.classList.remove('input_desactivado');
                mensaje.classList.remove('textarea-form-des');
                tipoIdentificacion.classList.add('input_2');
                numeroIdentificacion.classList.add('input_3');
                nombre.classList.add('input-form');
                nombre.classList.add('input-form');
                telefono.classList.add('input-form');
                email.classList.add('input-form');
                direccion.classList.add('input-form');
                ciudad.classList.add('input-form');
                mensaje.classList.add('textarea-form');
                // nombre.disabled = false;
                // telefono.disabled = false;
                // email.disabled = false;
                // direccion.disabled = false;
                // ciudad.disabled = false;
                // nombre.required = true;
                // telefono.required = true;
                // email.required = true;
            }
        });
    });


    window.addEventListener('load', init, false);
    function init() {
        let div = document.querySelector('#div-nombres');
        div.style.visibility = 'visible';
        let boton = document.querySelector('#select');
        console.log(boton);
        boton.addEventListener('click', function (e) {
            if(div.style.visibility === 'visible'){
                div.style.visibility = 'hidden';
            }else{
                div.style.visibility = 'visible';
            }
        }, false);
    }


