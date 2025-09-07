# Laboratorio de Desarrollo Seguro de Software

Este repositorio es una demostración práctica para la diplomatura en ciberseguridad, enfocada en el desarrollo seguro de software. Aquí encontrarás ejemplos de aplicaciones PHP vulnerables y seguras, para experimentar y aprender sobre ataques como **SQL Injection** y cómo prevenirlos.

## Objetivo
- Entender cómo se produce una vulnerabilidad de SQL Injection.
- Aprender a mitigarla usando buenas prácticas de desarrollo seguro.
- Practicar el uso de herramientas de análisis y explotación de vulnerabilidades.

## Estructura del proyecto
```
app/
├── docker-compose.yml
├── Dockerfile
├── index_safe.php        # Versión segura
├── index.php             # Versión vulnerable
├── init.sql              # Script de inicialización de la base de datos
├── php_secure/           # Carpeta para versión segura
│   └── index.php
├── php_vulnerable/       # Carpeta para versión vulnerable
│   └── index.php
```

## Requisitos previos
- Tener instalado [Docker](https://docs.docker.com/get-docker/) y [Docker Compose](https://docs.docker.com/compose/install/).
- Navegador web moderno.

## Despliegue rápido
1. **Clona el repositorio:**
   ```zsh
   git clone <URL_DEL_REPOSITORIO>
   cd <CARPETA_DEL_REPOSITORIO>/app
   ```

2. **Levanta los servicios con Docker Compose:**
   ```zsh
   docker-compose up --build
   ```
   Esto iniciará dos servicios:
   - `web`: Servidor PHP + Apache
   - `db`: Base de datos MySQL con datos de ejemplo

3. **Accede a la aplicación:**
   - Versión vulnerable: [http://localhost:8080/php_vulnerable/index.php](http://localhost:8080/php_vulnerable/index.php)
   - Versión segura: [http://localhost:8080/php_secure/index.php](http://localhost:8080/php_secure/index.php)
   - También puedes probar el archivo raíz `index.php` y `index_safe.php` si están presentes.

## ¿Cómo probar la vulnerabilidad?
- En la versión vulnerable, ingresa un usuario válido como `admin`.
- Para explotar la vulnerabilidad, prueba con:
  ```
  ' OR '1'='1
  ```
  Esto debería mostrar todos los usuarios de la base de datos.

## Herramientas recomendadas para interceptar peticiones HTTP
- [Burp Suite](https://portswigger.net/burp) (versión Community)
- [OWASP ZAP](https://www.zaproxy.org/)
- Extensiones de navegador como ModHeader

## Apaga el entorno
Para detener y eliminar los contenedores:
```zsh
docker-compose down
```

## Notas educativas
- El código vulnerable está en la carpeta `php_vulnerable` y el seguro en `php_secure`.
- El archivo `init.sql` crea la tabla y usuarios de ejemplo.
- Puedes modificar el código para experimentar con otras vulnerabilidades y protecciones.

---

**¡Explora, aprende y experimenta!**

Para dudas o sugerencias, contacta al docente o abre un issue en el repositorio.
