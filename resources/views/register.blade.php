<!doctype html>
<html lang="en">

<head>
    <title>Registrar - Usuario</title>
    <link rel="icon" href="images/logoU.ico">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
    <script src="js/eventos.js"></script>
    <script src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/styles-tabla.css">


</head>
    <body>
        <section class="vh-100" style="background-color: #00498B;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="images/quime.png" alt="Uniautonoma"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <form id="formularioRegistro" action="{{route('validar-registro')}}" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center mb-2 pb-0">
                                                <span class="h1 fw-bold mb-0">INGRESA LOS DATOS</span>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="nombreInput">Nombres</label>
                                                <input type="name" name="nameRegistro" id="nombreInput" class="form-control form-control-lg" required/>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="emailInput">Correo electrónico</label>
                                                <input name="emailRegistro" type="email" id="emailInput" class="form-control form-control-lg" required/>
                                                <span id="mensajeExiste"></span>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="pass">Contraseña</label>
                                                <input type="password" name="passwordRegistro" id="pass" class="form-control form-control-lg" required oninput="validarCaracteres()"/>
                                                <span id="eyeIcon" class="fa fa-eye password-toggle" onclick="mostrarPassword()"></span>
                                                @error('passwordRegistro')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="passConfirm">Confirmar contraseña</label>
                                                <input type="password" name="passwordRegistro2" id="passConfirm" class="form-control form-control-lg" required  oninput="validarPasswords()"/>
                                                <span id="eyeIconC" class="fa fa-eye password-toggle" onclick="mostrarConfirmacionPassword()"></span>
                                                <p style="color: red" id="passwordMessage"></p>
                                            </div>
                                            <div class="pt-1 mb-2">
                                                <button style="border-radius: 20px;" class="btn btn-dark btn-lg btn-block" type="submit" id="botonRegistrar" disabled onclick="registrarUsuario()">Crear Cuenta</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
