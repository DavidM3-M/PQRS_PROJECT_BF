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
                                        <form action="/cambiarPassword" method="POST">
                                            @csrf

                                            <div class="d-flex align-items-center mb-2 pb-0">
                                                <span class="h1 fw-bold mb-0">ACTUALIZAR CONTRASEÑA</span>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="correoRegistrado">Correo electrónico usuario registrado</label>
                                                <input name="correoRegistrado" type="email" id="correoRegistrado" class="form-control form-control-lg" required/>
                                                @error('correoRegistrado')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="contrasena">Nueva contraseña</label>
                                                <input type="password" name="passRegistrada" id="contrasena" class="form-control form-control-lg" required/>
                                                <span id="ver" class="fa fa-eye password-toggle" onclick="verPassword()"></span>
                                                @error('passRegistrada')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="pt-1 mb-2">
                                                <button style="border-radius: 20px;" class="btn btn-dark btn-lg btn-block" type="submit">Actualizar contraseña</button>
                                            </div>
                                        </form>
                                        @if (session('success'))
                                            <div class="alert alert-success alert-custom" id="alerta">
                                                {{ session('success') }}
                                            </div>
                                            <script>
                                                setTimeout(function () {
                                                    $('#alerta').fadeOut();
                                                }, 4000);
                                            </script>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function verPassword() {
                var pass = document.getElementById("contrasena");
                var eyeIcon = document.getElementById("ver");

                if (pass.type === "password") {
                    pass.type = "text";
                    eyeIcon.className = "fa fa-eye-slash password-toggle";
                } else {
                    pass.type = "password";
                    eyeIcon.className = "fa fa-eye password-toggle";
                }
            }
        </script>
    </body>
</html>
