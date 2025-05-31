![image](https://user-images.githubusercontent.com/79814537/227503253-efff5b8d-79b8-4a2b-9e76-79800998b4d5.png)

# Programación Web Avanzada 2024 - Grupo 12 - Trabajo Práctico N°3 Laravel Framework


### 👥Integrantes
- Pamich, Gabriel 
- Padilla, Francisco


## Objetivo del proyecto
Desarrollar una aplicación web tipo blog que muestre posts y tenga categorias de los mismos.
### Dominio: Recetas de cocina
Creamos un blog basado en recetas de cocina.




## Instalación
1) Clonar el repo y ejecutar ``` php composer install```
2) Crear un archivo .env  con variables de entorno basado en el .env.example
3) Luego de configurar el archivo .env con las variables locales que tengas para mysql y demas, ejecutar migraciones con  ``` php artisan migrate```
4) Ejecutar seeders ```php artisan db:seed``` para cargar el contenido default del blog a la base de datos.
5) Ejecutar ```php artisan serve```  y ```npm run dev```para iniciar la aplicacion en modo desarrollo, cada uno en una consola separada.


## 🚀 Tecnologías
PHP, Blade, Tailwind, viteJS, Laravel, Eloquent