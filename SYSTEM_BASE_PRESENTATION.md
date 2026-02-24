# Presentación: Base del sistema SistemaPqrsf

Fecha: 2026-02-24

## Propósito
Documento para presentar la base técnica y funcional del sistema SistemaPqrsf a stakeholders o equipo técnico. Contiene arquitectura, stack, estructura de datos, endpoints principales, pasos para levantar entorno y recomendaciones.

## Resumen ejecutivo
Sistema de gestión de PQRS (Peticiones, Quejas, Reclamos y Sugerencias) construido con Laravel 10 (PHP 8.1+) en backend y Vite en frontend. Proporciona registro/ingreso de usuarios, envío de solicitudes (PQR) con adjuntos, listado y respuesta a solicitudes por personal autorizado.

## Tecnologías clave
- Backend: PHP 8.1+, Laravel 10
- Frontend: Blade templates, Vite (HMR), Bootstrap 5
- DB: MySQL (configurable via `.env`), migrations con Eloquent/Schema
- Autenticación: Laravel `Auth` (sesiones), logs en `storage/logs/laravel.log`
- Almacenamiento de archivos: `Storage` (disk `local`) para adjuntos
- Dev tools: Composer, NPM, Vite

## Estructura importante del repositorio (resumen)
- `app/Http/Controllers/` - controladores principales (`SessionController`, `FormularioController`, `ListaSolicitudesController`)
- `app/Models/` - modelos (`User`, `Formulario`, `InformacionSolicitud`)
- `database/migrations/` - migraciones de tablas
- `resources/views/` - vistas Blade (login, register, index, formularios)
- `public/` - assets públicos (css, js, images)
- `storage/logs/laravel.log` - logs de la aplicación

## Esquema de datos (principal)
- `users` - usuarios del sistema (id, name, email, password, timestamps)
- `formulario` - solicitudes recibidas (id, tipoSolicitante, tipoSolicitud, descripcion, correo, rutaAdjunto, timestamps)
- `informacion_solicitud` - metadatos/estado por radicado (radicado (FK formulario.id), estado, respuesta, fechaVencimiento, timestamps)

## Endpoints y rutas relevantes (web)
- GET `/` → vista principal (`index`)
- GET `/login` → vista login
- POST `/iniciar-sesion` → `SessionController@login`
- POST `/validar-registro` → `SessionController@register`
- POST `/enviarSolicitud` → `FormularioController@guardarDatos` (crea PQR)
- POST `/listarRadicados` → `FormularioController@listarRadicados`
- POST `/mostrarInformacion` → `FormularioController@mostrarInformacion`
- GET `/lista-solicitudes` → `ListaSolicitudesController@mostrarTodas` (protegida con `auth`)

## Cómo levantar la base del sistema (rápido)
1. Copiar `.env.example` → `.env` y configurar DB (MySQL) y `APP_URL`.
2. Instalar dependencias:
   - `composer install`
   - `npm install`
3. Generar clave de aplicación: `php artisan key:generate`
4. Migrar BD: `php artisan migrate --force`
5. Levantar dev servers:
   - `npm run dev`
   - `php artisan serve --host=127.0.0.1 --port=8000`

## Log, depuración y pruebas
- Logs: `storage/logs/laravel.log` (errores y eventos). Se añadieron logs para login y guardado de PQRs.
- Consola: `FormuarioController::guardarDatos` ahora escribe éxito/errores a STDOUT/STDERR para ver en la terminal del servidor.
- Pruebas manuales recomendadas:
  - Registro de usuario y login (usar `test@example.com` / `password` para pruebas).
  - Envío de PQRs con y sin adjuntos.
  - Revisión de `storage/logs/laravel.log` y salida del servidor para mensajes.

## Seguridad y producción
- Revertir cualquier exclusión de CSRF y no exponer rutas con CSRF deshabilitado.
- Usar HTTPS, configurar políticas CORS si se exponen APIs, y habilitar autenticación basada en tokens (Sanctum) para integraciones programáticas.
- Proteger almacenamiento de archivos y servir adjuntos con control de acceso.

## Recomendaciones de tareas siguientes
1. Añadir tests automatizados (Feature) para registro/login/carga PQR.
2. Documentar API (OpenAPI/Swagger) si se planea uso externo.
3. Pipeline CI para ejecutar tests y despliegue (GitHub Actions / Gitlab CI).

---
Archivo creado y commiteado al repo para presentación técnica.
