# Cruz Roja - Filial Asunción

Gestión de voluntarios, moviles y movimientos.

## Tecnologías
- Laravel 11
- Livewire 3
- Adminlte 3

## Requisitos previos

- PHP 8.2 o superior
- Composer
- Una base de datos compatible (MySQL, PostgreSQL, SQLite, etc.) por defecto usamos mysql

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/rniz06/cruzroja.git
    ```

2. En el directorio Instala las dependencias de Composer:
    ```bash
    composer install
    ```

3. Copia el archivo de configuración .env.example a .env y configura tus variables de entorno:
    ```bash
    cp .env.example .env
    ```

4. Genera una nueva clave de aplicación:
    ```bash
    php artisan key:generate
    ```

5. Realiza las migraciones y ejecuta los seeders:
    ```bash
    php artisan migrate --seed
    ```

¡Listo! Ahora puedes acceder al sistema en tu navegador web.

# Observaciones

No olvidar migrar los datos de las tablas py_departamentos, py_ciudades y py_barrios de los archivos csv. Esto se hace de manera manual.

# Soporte

Ante dudas o consultas contactar con ronaldalexisniznunez@gmail.com