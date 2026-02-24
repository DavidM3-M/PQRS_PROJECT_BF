<!doctype html>
<html lang="en">

    <head>
        <title>InicioSesión</title>
        <link rel="icon" href="images/logoU.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="css/styles-tabla.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                        <form action="{{route('iniciar-sesion')}}" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <span class="h1 fw-bold mb-0">GESTIÓN DE SOLICITUDES</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa con tu cuenta</h5>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="user">Correo electrónico</label>
                                                <input type="email" name="user" id="user" class="form-control form-control-lg" required/>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">Contraseña</label>
                                                <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
                                                <span id="icono-login" class="fa fa-eye password-toggle" onclick="mostrarPasswordLogin()"></span>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button style="border-radius: 20px;" class="btn btn-dark btn-lg btn-block" type="submit">Iniciar sesión</button>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger alert-custom" id="notificacion">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success" id="notificacion-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <script>
                                                setTimeout(function () {
                                                    $('#notificacion').fadeOut();
                                                    $('#notificacion-success').fadeOut();
                                                }, 5000);
                                            </script>
                                            {{-- <a class="small text-muted" href="#!">¿Olvidó su contraseña?</a> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function mostrarPasswordLogin() {
                var pass = document.getElementById("password");
                var eyeIcon = document.getElementById("icono-login");

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
