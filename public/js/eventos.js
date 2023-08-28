


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

        var campos = [
            document.getElementById('solicitante').value,
            document.getElementById('solicitud').value,
            document.getElementById('nombre').value,
            document.getElementById('apellido').value,
            document.getElementById('telefono').value,
            document.getElementById('email').value,
            document.getElementById('mensaje').value
        ];

        var validacion = validarFormulario(campos)

        if(validacion != false){
            Swal.fire(
                'SOLICITUD ENVIADA',
                '',
                'success'
              )
        }
    }
