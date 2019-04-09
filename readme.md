## Requerimientos

Se necesita:

- PHP 7
- MySql 5
- Composer

## Instalación

Los datos de la base de datos se encuentra en el archivo .env (ubicado en la raíz, si no se encuentra renombrar el archivo env.example), por defecto es la siguiente configuración:
- Base de datos: landgorilla
- usuario: root
- password: (vacio)


Por consola se debe aplicar cada comando:

- composer install
- php artisan migrate
- php artisan db:seed

## Uso

El usuario por defecto es "admin@gmail.com" y la clave es "password"