# Proyecto Laravel con Docker

Este proyecto es una aplicación Laravel desplegada con Docker. Incluye archivos de configuración para facilitar la ejecución en contenedores.

## Requisitos previos

Asegúrate de tener instalados los siguientes programas en tu sistema:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalación y ejecución

Sigue los siguientes pasos para construir y ejecutar los contenedores de la aplicación:

1. **Clonar el repositorio:**

   ```sh
   git clone <URL_DEL_REPOSITORIO>
   cd <NOMBRE_DEL_PROYECTO>
   ```

2. **Construir y levantar los contenedores:**

   ```sh
   docker-compose up -d --build
   ```

3. **Ejecutar migraciones de la base de datos (si aplica):**

   ```sh
   docker exec -it laravel_app php artisan migrate
   ```

4. **Acceder a la aplicación:**

    - Desde el navegador: [http://localhost:8000](http://localhost:8000)
    - phpMyAdmin: [http://localhost:8081](http://localhost:8081)

## Administración de contenedores

- **Ver logs:**
  ```sh
  docker-compose logs -f
  ```
- **Detener los contenedores:**
  ```sh
  docker-compose down
  ```
- **Reiniciar los contenedores:**
  ```sh
  docker-compose restart
  ```

## Estructura del proyecto

```
/NOMBRE_DEL_PROYECTO
├── frontend/
│   ├── index.html
│   ├── styles.css
│   ├── script.js
├── backend/
│   ├── app/
│   ├── routes/
│   ├── database/
│   ├── .env
├── docker/
│   ├── Dockerfile
│   ├── docker-compose.yml
├── README.md
```

## Notas adicionales

- Asegúrate de modificar `docker-compose.yml` y `.env` según sea necesario para tu entorno.
- Si usas un subdominio, debes configurar tu proxy inverso (como Nginx) o utilizar Docker con una red personalizada para enlazarlo correctamente.

Si tienes problemas o dudas, consulta la documentación de Laravel y Docker o abre un issue en el repositorio. 🚀

