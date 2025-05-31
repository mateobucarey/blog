Clonar el repositorio.

Ejecutar composer install.

Generar un archivo .env con variables de entorno tomando como referencia el archivo .env.example.

Ejecutar migraciones con php artisan migrate.

Ejecutar seeders php artisan db:seed para cargar todo el contenido default del blog a la base de datos.

Ejecutar php artisan serve y npm run dev para iniciar, cada uno en una consola separada, osea en una consola ejecutar php artisan serve y abrir otra consola para ejecutar npm run dev