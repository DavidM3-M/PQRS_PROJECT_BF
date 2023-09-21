


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
                document.getElementById('nombre').value,
                document.getElementById('apellido').value,
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
        const nombre = document.getElementById("nombre");
        const apellido = document.getElementById("apellido");
        const telefono = document.getElementById("telefono");
        const email = document.getElementById("email");
        const ciudad = document.getElementById("ciudad");
        const direccion = document.getElementById("direccion");
        const mensaje = document.getElementById("mensaje");

        seleccion.addEventListener("change", function() {

            nombre.value = "";
            apellido.value = "";
            telefono.value = "";
            email.value = "";
            ciudad.value = "";
            direccion.value = "";
            solicitud.value = "";
            mensaje.value = "";


            if (seleccion.value === "Anonimo") {
                nombre.classList.add('input_desactivado');
                nombre.classList.add('input_desactivado');
                apellido.classList.add('input_desactivado');
                telefono.classList.add('input_desactivado');
                email.classList.add('input_desactivado');
                direccion.classList.add('input_desactivado');
                ciudad.classList.add('input_desactivado');
                mensaje.classList.remove('textarea-form-des');
                mensaje.classList.add('textarea-form');
                nombre.disabled = true;
                apellido.disabled = true;
                telefono.disabled = true;
                email.disabled = true;
                direccion.disabled = true;
                ciudad.disabled = true;
                nombre.required = false;
                apellido.required = false;
                telefono.required = false;
                email.required = false;

            } else if (seleccion.value === "Natural" || seleccion.value === "Juridica") {
                nombre.classList.remove('input_desactivado');
                nombre.classList.remove('input_desactivado');
                apellido.classList.remove('input_desactivado');
                telefono.classList.remove('input_desactivado');
                email.classList.remove('input_desactivado');
                direccion.classList.remove('input_desactivado');
                ciudad.classList.remove('input_desactivado');
                mensaje.classList.remove('textarea-form-des');
                nombre.classList.add('input-form');
                nombre.classList.add('input-form');
                apellido.classList.add('input-form');
                telefono.classList.add('input-form');
                email.classList.add('input-form');
                direccion.classList.add('input-form');
                ciudad.classList.add('input-form');
                mensaje.classList.add('textarea-form');
                nombre.disabled = false;
                apellido.disabled = false;
                telefono.disabled = false;
                email.disabled = false;
                direccion.disabled = false;
                ciudad.disabled = false;
                nombre.required = true;
                apellido.required = true;
                telefono.required = true;
                email.required = true;
            }
        });
    });

    // Obtén referencias a elementos HTML
const abrirModal = document.getElementById("abrirModal");
const miModal = document.getElementById("miModal");
const cerrarModal = document.getElementById("cerrarModal");

// Abre el modal cuando se hace clic en el enlace
abrirModal.addEventListener("click", function () {
  miModal.style.display = "block";
});

// Cierra el modal cuando se hace clic en la 'x' o fuera del modal
cerrarModal.addEventListener("click", function () {
  miModal.style.display = "none";
});

window.addEventListener("click", function (event) {
  if (event.target === miModal) {
    miModal.style.display = "none";
  }
});
