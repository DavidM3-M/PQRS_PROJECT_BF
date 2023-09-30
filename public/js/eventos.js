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

                tipoIdentificacion.classList.remove('input_form');
                numeroIdentificacion.classList.remove('input_form');
                nombre.classList.remove('input_form');
                telefono.classList.remove('input_form');
                email.classList.remove('input_form');
                direccion.classList.remove('input_form');
                ciudad.classList.remove('input_form');
                mensaje.classList.remove('textarea-form-des');
                tipoIdentificacion.classList.add('input_desactivado');
                numeroIdentificacion.classList.add('input_desactivado');
                nombre.classList.add('input_desactivado');
                telefono.classList.add('input_desactivado');
                email.classList.add('input_desactivado');
                direccion.classList.add('input_desactivado');
                ciudad.classList.add('input_desactivado');
                mensaje.classList.add('textarea-form');
                tipoIdentificacion.required = false;
                numeroIdentificacion.required = false;
                nombre.required = false;
                telefono.required = false;
                email.required = false;

            } else if (seleccion.value === "Natural" || seleccion.value === "Juridica") {

                tipoIdentificacion.classList.remove('input_desactivado');
                numeroIdentificacion.classList.remove('input_desactivado');
                nombre.classList.remove('input_desactivado');
                telefono.classList.remove('input_desactivado');
                email.classList.remove('input_desactivado');
                direccion.classList.remove('input_desactivado');
                ciudad.classList.remove('input_desactivado');
                mensaje.classList.remove('textarea-form-des');
                tipoIdentificacion.classList.add('input_form');
                numeroIdentificacion.classList.add('input_form');
                nombre.classList.add('input_form');
                nombre.classList.add('input_form');
                telefono.classList.add('input_form');
                email.classList.add('input_form');
                direccion.classList.add('input_form');
                ciudad.classList.add('input_form');
                mensaje.classList.add('textarea-form');
                tipoIdentificacion.required = true;
                numeroIdentificacion.required = true;
                nombre.required = true;
                telefono.required = true;
                email.required = true;
                mensaje.required = true;
            }
        });
    });


    // public/js/ajax.js

document.addEventListener('DOMContentLoaded', function () {
    const estadosSelect = document.getElementById('radicado');
    const ciudadesSelect = document.getElementById('informacionRadicado');

    estadosSelect.addEventListener('change', function () {
        const estadoId = estadosSelect.value;

        fetch(`/informacionRadicado?estado_id=${estadoId}`)
            .then(response => response.json())
            .then(data => {
                // Limpia y llena el select de ciudades
                ciudadesSelect.innerHTML = '';
                data.forEach(informacion => {
                    const option = document.createElement('option');
                    option.value = informacion.id;
                    option.textContent = informacion.nombres;
                    ciudadesSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar ciudades:', error);
            });
    });
});


