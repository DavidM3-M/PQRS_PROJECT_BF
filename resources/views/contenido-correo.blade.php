<!-- resources/views/correo-tarjetica.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjetica</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .tarjeta {
            background-color: #2c5c8a ;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
        }

        .titulo {
            color: #ffffff;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }

        .contenido {
            color: white;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .boton {
            background-color: #ff8000 ;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 18px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
        }
        .nota {
            color: #999999;
            font-size: 12px;
            margin-top: 20px;
        }
        .contenedor-imagen {
            text-align: center;
        }
        .logo {
            max-width: 100%;
            height: auto;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="tarjeta">
        <div class="titulo">¡Hola!</div>
        <div class="contenedor-imagen">
            {{-- <img class="logo" src="images/logoAut1.png"> --}}
            <img class="logo" src="cid:logo.png">
        </div>
        <div class="contenido">
            <p>Hemos recibido tu PQRSF y le asignamos el número de radicado <strong># {{$radicado}}</strong>.</p>
	    <p>Estamos trabajando en procesar tu solicitud y te informaremos cualquier actualización.</p>
        </div>
        <div class="contenido">
            <p>Agradecemos tu confianza al utilizar nuestros servicios. Tu opinión es valiosa para nosotros.</p>
        </div>
        <a href="https://pqrsf.uniautonoma.edu.co/buscar-radicado" class="boton">Ver estado de solicitud</a>
        <div class="nota">
            <p>Este es un mensaje generado automáticamente. Por favor, no respondas a este correo.</p>
        </div>
    </div>
</body>
</html>
