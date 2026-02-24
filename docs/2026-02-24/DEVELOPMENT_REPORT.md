```markdown
# Desarrollo y estado del proyecto SistemaPqrsf

Fecha: 2026-02-24

## Resumen
Documento técnico corto y reproducible que describe los cambios realizados, cómo levantar la aplicación, pruebas usadas y siguientes pasos recomendados.

## Objetivo
- Levantar la aplicación Laravel + Vite localmente.
- Corregir errores de migraciones y de flujo de inicio de sesión.
- Habilitar logging y salidas por consola para depuración de cargas PQR.

## Cambios principales aplicados
- `app/Http/Controllers/FormularioController.php`: manejo de errores (`try/catch`), `Log::error`, salidas por consola (`STDOUT`/`STDERR`) y protección contra lectura de `id` cuando la tabla está vacía.
- `app/Http/Controllers/SessionController.php`: validaciones de registro/login, logging de intentos (info/warning) y correcciones de flujo.
- `routes/web.php`: cambiada la ruta de `/registro` para permitir acceso de invitados (`guest`) en lugar de `auth`.
- Migraciones en `database/migrations/`: se identificaron y resolvieron duplicados/timestamps conflictivos que causaban SQL 1050.

## Archivos modificados (resumen)
- app/Http/Controllers/FormularioController.php
- app/Http/Controllers/SessionController.php
- routes/web.php
- database/migrations/* (ajustes de duplicados)

## Cómo reproducir localmente (resumen)
1. Clonar el repositorio y entrar al directorio del proyecto.
2. Copiar `.env.example` a `.env` y configurar la conexión a la base de datos.
3. Instalar dependencias PHP y JS:
   - `composer install`
   - `npm install`
4. Generar `APP_KEY`:
   - `php artisan key:generate`
5. Ejecutar migraciones:
   - `php artisan migrate --force`
6. Levantar servidores:
   - `npm run dev` (Vite)
   - `php artisan serve --host=127.0.0.1 --port=8000`

## Pruebas rápidas útiles
- Usuario de prueba (login):
  - Usuario: `test@example.com`
  - Contraseña: `password`

- Probar login vía curl:
```
curl.exe -i -X POST "http://127.0.0.1:8000/iniciar-sesion" -F "user=test@example.com" -F "password=password" -c cookiejar
```

- Probar envío PQR (sin archivo):
```
curl.exe -i -X POST "http://127.0.0.1:8000/enviarSolicitud" -F "tipoSolicitante=Anonimo" -F "tipoSolicitud=Peticion" -F "tipoUsuario=Natural" -F "descripcion=Prueba"
```

## Logs y depuración
- Archivo principal de logs: `storage/logs/laravel.log`.
- Ver logs en tiempo real (PowerShell):
```
Get-Content -Path .\storage\logs\laravel.log -Tail 50 -Wait
```
- Se ha añadido escritura a consola en `FormuarioController::guardarDatos` para ver éxito y errores directamente en la salida del servidor.

## Problemas conocidos y notas
- Se excluyó temporalmente la verificación CSRF en rutas específicas para pruebas programáticas. Esto debe revertirse antes de producción o reemplazarse con un mecanismo seguro (Sanctum / tokens).
- Revisar archivos de migración para dejar solo las migraciones necesarias en historiales de producción.

## Siguientes pasos recomendados
1. Revertir exclusiones de CSRF y usar autenticación API para integraciones.
2. Ejecutar pruebas funcionales automáticas (Feature tests) para registro/login/carga PQR.
3. QA: probar subida de adjuntos, descarga y permiso de acceso.
4. Documentar endpoints API y contratos (JSON) si se exponen para integraciones.

---
Creado por: Equipo de desarrollo (acciones automáticas desde el entorno de trabajo)

```
