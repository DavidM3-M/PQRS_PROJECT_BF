
    document.addEventListener("DOMContentLoaded", function() {
        var seleccion = document.getElementById("solicitante");
        var solicitud = document.getElementById("solicitud");
        var tipoIdentificacion = document.getElementById("tipoIdentificacion");
        var numeroIdentificacion = document.getElementById("numeroIdentificacion");
        var nombre = document.getElementById("nombre");
        var telefono = document.getElementById("telefono");
        var email = document.getElementById("email");
        var tipoUsuario = document.getElementById("tipoUsuario");
        var mensaje = document.getElementById("mensaje");
        var div1 = document.getElementById('divTipoIdentificacion');
        var div2 = document.getElementById('divNumeroIdentificacion');
        var div3 = document.getElementById('divNombres');
        var div4 = document.getElementById('divCorreo');
        var div5 = document.getElementById('divCelular');
        var div7 = document.getElementById('divCheck');
        var notificacion = document.getElementById("archivoCargado");
        var archivoAdjunto = document.getElementById("archivoInput");

        seleccion.addEventListener("change", function() {

            nombre.value = "";
            telefono.value = "";
            email.value = "";
            tipoUsuario.value = "";
            solicitud.value = "";
            mensaje.value = "";
            tipoIdentificacion.value = "";
            numeroIdentificacion.value = "";
            notificacion.textContent = "";
            archivoAdjunto.value = "";

            if (seleccion.value === "Anonimo") {

                mensaje.classList.remove('textarea-form');
                mensaje.classList.add('textarea-anonimo');
                tipoIdentificacion.required = false;
                numeroIdentificacion.required = false;
                nombre.required = false;
                telefono.required = false;
                email.required = false;
                div1.style.display = 'none';
                div2.style.display = 'none';
                div3.style.display = 'none';
                div4.style.display = 'none';
                div5.style.display = 'none';
                div7.style.display = 'none';


            } else if (seleccion.value === "Natural" || seleccion.value === "Juridica") {

                mensaje.classList.remove('textarea-anonimo');
                mensaje.classList.add('textarea-form');
                tipoIdentificacion.required = true;
                numeroIdentificacion.required = true;
                nombre.required = true;
                telefono.required = true;
                email.required = true;
                mensaje.required = true;
                div1.style.display = 'block';
                div2.style.display = 'block';
                div3.style.display = 'block';
                div4.style.display = 'block';
                div5.style.display = 'block';
                div7.style.display = 'block';

                if (seleccion.value === "Juridica") {
                    document.getElementById("labelIdentificacion").innerHTML = "NIT";
                    document.getElementById("labelNombres").innerHTML = "Razón Social";
                }else{
                    document.getElementById("labelIdentificacion").innerHTML = "Número de identificación";
                    document.getElementById("labelNombres").innerHTML = "Nombres y apellidos";
                }
            }
        });
    });

    function mostrarPassword() {
        var pass = document.getElementById("pass");
        var eyeIcon = document.getElementById("eyeIcon");

        if (pass.type === "password") {
            pass.type = "text";
            eyeIcon.className = "fa fa-eye-slash password-toggle";
        } else {
            pass.type = "password";
            eyeIcon.className = "fa fa-eye password-toggle";
        }
    }


    function mostrarConfirmacionPassword() {
        var pass = document.getElementById("passConfirm");
        var eyeIcon = document.getElementById("eyeIconC");

        if (pass.type === "password") {
            pass.type = "text";
            eyeIcon.className = "fa fa-eye-slash password-toggle";
        } else {
            pass.type = "password";
            eyeIcon.className = "fa fa-eye password-toggle";
        }
    }

    function validarCaracteres() {
        var passwordRegistro = document.getElementById("pass").value;
        var botonRegistrar = document.getElementById("botonRegistrar");
        var passConfirm = document.getElementById("passConfirm");

        if (passwordRegistro.length < 8) {
            document.getElementById("passwordMessage").innerHTML = "La contraseña debe contener mínimo 8 caracteres";
            botonRegistrar.disabled = true;
            passConfirm.disabled = true;

        }else if (passwordRegistro.length >= 8 && passConfirm.value !==  passwordRegistro) {
            document.getElementById("passwordMessage").innerHTML = "Las contraseñas no coinciden";
            passConfirm.disabled = false;
            botonRegistrar.disabled = true;
        }
        else {
            document.getElementById("passwordMessage").innerHTML = "";
            passConfirm.disabled = false;
        }
    }

    function validarPasswords() {
        var passwordRegistro = document.getElementById("pass").value;
        var passwordRegistro2 = document.getElementById("passConfirm").value;
        var botonRegistrar = document.getElementById("botonRegistrar");

        if (passwordRegistro === passwordRegistro2 ) {
            if (passwordRegistro.length >= 8) {
                document.getElementById("passwordMessage").innerHTML = "";
                botonRegistrar.disabled = false;
            }else{
                document.getElementById("passwordMessage").innerHTML = "La contraseña debe contener mínimo 8 caracteres";
                botonRegistrar.disabled = true;
            }
        }else {
            document.getElementById("passwordMessage").innerHTML = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
            botonRegistrar.disabled = true;
        }
    }



    function registrarUsuario() {
        nombre = document.getElementById('nombreInput').value;
        email = document.getElementById('emailInput').value;
        pass = document.getElementById('pass').value;
        passConfirm = document.getElementById('passConfirm').value;

        if ( nombre !== "" && pass !== "" && passConfirm !== "" && esCorreoValido(email) ) {

            Swal.fire({
                title: 'USUARIO REGISTRADO',
                icon: 'success',
                showConfirmButton: true
              });
        }
    }


    function esCorreoValido(correo) {
        var expresionRegular = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return expresionRegular.test(correo);
    }


    function convertirAMayusculas(input) {
        input.value = input.value.toUpperCase();
    }

    function convertirAMinusculas(input) {
        input.value = input.value.toLowerCase();
    }


    function limpiarInputArchivo() {
        document.getElementById('archivoInput').value = "";
        document.getElementById('archivoCargado').innerHTML = "";
    }

    $(document).ready(function() {
        document.getElementById("archivoInput").addEventListener("change", function() {
            var archivoAdjunto = document.getElementById("archivoInput");
            var enlace = document.createElement("a");
            var icono = document.createElement("i");
            var archivoSeleccionado = archivoAdjunto.files[0];
            var nombreArchivo = archivoSeleccionado.name;
            var mensaje = document.getElementById("archivoCargado");
            var extension = nombreArchivo.split('.').pop(); // Obtener la extensión
            var extensionesPermitidas = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xlsx', 'zip', 'rar'];
            var maxSize = 3 * 1024 * 1024;
            if (extensionesPermitidas.includes(extension.toLowerCase())) {
                if (archivoSeleccionado.size > maxSize) {
                    mensaje.textContent = 'El archivo es demasiado grande. El tamaño máximo permitido es 3 MB.';
                    archivoAdjunto.value = "";
                }else {
                    mensaje.textContent = nombreArchivo + '   ';
                    enlace.href = "javascript:limpiarInputArchivo()";
                    icono.className = "fa fa-times-circle delete";
                    icono.title = "Quitar adjunto";
                    enlace.appendChild(icono);
                    mensaje.appendChild(enlace);
                }
            } else {
                mensaje.textContent = extension + ', no es una extensión permitida';
                archivoAdjunto.value = "";
            }
        });
    });

    function eliminarAdjunto() {
        document.getElementById('archivoInput').value = "";
        document.getElementById('archivoCargado').innerHTML = "";
    }
